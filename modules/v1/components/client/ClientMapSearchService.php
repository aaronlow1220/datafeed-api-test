<?php

namespace v1\components\client;

use InvalidArgumentException;
use app\components\client\ClientMapRepo;
use v1\models\validator\ClientMapSearch;
use yii\data\ActiveDataProvider;

/**
 * Client map search service.
 *
 * @author Aaron Low <aaron.low@atelli.ai>
 */
class ClientMapSearchService
{
    /**
     * constructor.
     *
     * @param ClientMapRepo $clientMapRepo
     */
    public function __construct(private ClientMapRepo $clientMapRepo) {}

    /**
     * currency search data provider.
     *
     * @param array{keyword?:string, enabledValues?:string[]} $params
     * @return ActiveDataProvider
     */
    public function createDataProvider(array $params): ActiveDataProvider
    {
        $searchModel = new ClientMapSearch($params);
        if (!$searchModel->validate()) {
            throw new InvalidArgumentException(implode(' ', $searchModel->getErrorSummary(true)));
        }

        // create query
        $query = $this->clientMapRepo->find();

        // filter by keyword
        if ($searchModel->keyword) {
            $query->andFilterWhere([
                'or',
                ['like', 'name', $searchModel->keyword],
            ]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => &$query,
            'pagination' => [
                'class' => 'v1\components\Pagination',
                'params' => $params,
            ],
            'sort' => [
                'enableMultiSort' => true,
                'params' => $params,
            ],
        ]);

        return $dataProvider;
    }
}
