<?php

namespace v1\controllers;

use v1\components\ActiveApiController;
use Marquine\Etl\Etl;
use function Flow\ETL\DSL\{data_frame};
use function Flow\ETL\Adapter\CSV\{from_csv};

class TransformerController extends ActiveApiController
{
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

    public function actionTransform()
    {
        $filePath = __DIR__ . '/../files/footer_adgeek_feed.csv';

        $rows = data_frame()
            ->read(from_csv($filePath))
            ->getAsArray();

        return $rows;
    }
}
