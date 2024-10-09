<?php

namespace v1\controllers;

use v1\components\ActiveApiController;
use function Flow\ETL\DSL\{data_frame};
use function Flow\ETL\Adapter\CSV\{from_csv, to_csv};
use app\components\client\ClientRepo;
use app\modules\v1\Module;
use function Flow\ETL\DSL\from_array;
use SimpleXMLElement;

class TransformerController extends ActiveApiController
{
    /**
     * constructor.
     *
     * @param string $id
     * @param Module $module
     * @param ClientRepo $clientRepo
     * @param array<string, mixed> $config
     *
     * @return void
     */
    public function __construct(string $id, Module $module, private ClientRepo $clientRepo, array $config = [])
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
        $filePath = __DIR__ . '/../files/footer_feed.xml';
        $filePathNew = __DIR__ . '/../files/footer_adgeek_feed.csv';

        $data = [];

        $xml = new SimpleXMLElement($filePath, 0, true);

        foreach ($xml->channel->item as $item) {
            $itemData = [];
            foreach ($item->children('g', true) as $key => $value) {
                $itemData[$key] = trim((string) $value);
            }
            $data[] = $itemData;
        }

        $etl = data_frame()
            ->read(from_array($data))
            ->select("id", "availability", "condition", "description", "image_link", "link", "title", "price", "sale_price", "gtin", "mpn", "brand", "google_product_category", "item_group_id", "custom_label_0", "custom_label_1", "custom_label_2", "custom_label_3", "custom_label_4")
            ->load(to_csv($filePathNew));

        $etl->run();

        return $etl;
    }

    /**
     * Transform CSV
     *
     * @return mixed
     */
    public function actionTransformCsv()
    {
        $filePath = __DIR__ . '/../files/airspace_feed.csv';
        $filePathNew = __DIR__ . '/../files/airspace_adgeek_feed.csv';

        $client = $this->clientRepo->findOne(['name' => "airspace"]);

        $client = json_decode($client["data"], true);

        $etl = data_frame()
            ->read(from_csv($filePath));

        foreach ($client as $key => $value) {
            $etl->rename($key, $value);
        }

        $etl->select(...array_keys($client))
            ->load(to_csv($filePathNew))
            ->run();
        return $etl;
    }
}
