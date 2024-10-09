<?php

namespace v1\controllers;

use v1\components\ActiveApiController;
use function Flow\ETL\DSL\{data_frame, from_array};
use function Flow\ETL\Adapter\CSV\{from_csv, to_csv};
use app\components\client\ClientRepo;
use app\components\platform\PlatformRepo;
use app\modules\v1\Module;
use SimpleXMLElement;

class TransformerController extends ActiveApiController
{
    /**
     * constructor.
     *
     * @param string $id
     * @param Module $module
     * @param ClientRepo $clientRepo
     * @param PlatformRepo $platformRepo
     * @param array<string, mixed> $config
     *
     * @return void
     */
    public function __construct(string $id, Module $module, private ClientRepo $clientRepo, private PlatformRepo $platformRepo, array $config = [])
    {
        parent::__construct($id, $module, $config);
    }

    /**
     * {@inherit}
     *
     * @return array<string, mixed>
     */
    public function actions()
    {
        $actions = parent::actions();

        unset($actions['index']);

        return $actions;
    }

    /**
     * Transform XML
     *
     * @return mixed
     */
    public function actionTransformXml()
    {
        $originPath = __DIR__ . '/../files/footer_feed.xml';
        $destinationPath = __DIR__ . '/../files/footer_adgeek_feed.csv';

        $data = [];

        $xml = new SimpleXMLElement($originPath, 0, true);

        foreach ($xml->channel->item as $item) {
            $itemData = [];
            foreach ($item->children('g', true) as $key => $value) {
                $itemData[$key] = trim((string) $value);
            }
            $data[] = $itemData;
        }

        $etl = data_frame()
            ->read(from_array($data))
            ->select("id", "availability", "condition", "description", "image_link", "link", "title", "price", "sale_price", "gtin", "mpn", "brand", "google_product_category", "item_group_id", "custom_label_0", "custom_label_1", "custom_label_2", "custom_label_3", "custom_label_4");

        // Load to CSV
        $etl->load(to_csv($destinationPath))->run();

        return $etl;
    }

    /**
     * Transform CSV
     *
     * @return mixed
     */
    public function actionTransformCsv()
    {
        $originPath = __DIR__ . '/../files/airspace_feed.csv';
        $destinationPath = __DIR__ . '/../files/airspace_adgeek_feed.csv';

        $client = $this->clientRepo->findOne(['name' => "airspace"]);
        $platform = $this->platformRepo->findOne(['name' => "fb"]);

        $client = json_decode($client["data"], true);
        $platform = json_decode($platform["data"], true);

        // Unset unwanted columns
        foreach ($platform as $key => $value) {
            if ($value === '') {
                unset($client[$key]);
                unset($platform[$key]);
            }
        }

        // Read CSV
        $etl = data_frame()->read(from_csv($originPath));

        // Rename columns
        foreach ($client as $key => $value) {
            $etl->rename($value, $key);
        }

        // Select only the columns that are required by the platform
        $etl->select(...array_keys($platform));

        // Load to CSV
        $etl->load(to_csv($destinationPath))->run();

        return $etl;
    }
}
