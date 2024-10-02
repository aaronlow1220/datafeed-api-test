<?php

namespace v1\controllers;

use Throwable;
use v1\components\ActiveApiController;
use yii\data\ActiveDataProvider;
use yii\web\HttpException;

/**
 * @OA\Tag(
 *     name="ClientMap",
 *     description="Everything about your ClientMap",
 * )
 *
 * @OA\Get(
 *     path="/client-map",
 *     summary="List",
 *     description="List all ClientMap",
 *     operationId="listClientMap",
 *     tags={"ClientMap"},
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         @OA\Schema(ref="#/components/schemas/StandardParams/properties/page")
 *     ),
 *     @OA\Parameter(
 *         name="pageSize",
 *         in="query",
 *         @OA\Schema(ref="#/components/schemas/StandardParams/properties/pageSize")
 *     ),
 *     @OA\Parameter(
 *         name="sort",
 *         in="query",
 *         @OA\Schema(ref="#/components/schemas/StandardParams/properties/sort")
 *     ),
 *     @OA\Parameter(
 *         name="fields",
 *         in="query",
 *         @OA\Schema(ref="#/components/schemas/StandardParams/properties/fields")
 *     ),
 *     @OA\Parameter(
 *         name="expand",
 *         in="query",
 *         @OA\Schema(type="string", enum={"xxxx"}, description="Query related models, using comma(,) be seperator")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *              @OA\Property(property="_data", type="array", @OA\Items(ref="#/components/schemas/ClientMap")),
 *              @OA\Property(property="_meta", type="object", ref="#/components/schemas/Pagination")
 *             )
 *         )
 *     )
 * )
 *
 * @OA\Get(
 *     path="/client-map/{id}",
 *     summary="Get",
 *     description="Get ClientMap by particular id",
 *     operationId="getClientMap",
 *     tags={"ClientMap"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ClientMap id",
 *         required=true,
 *         @OA\Schema(ref="#/components/schemas/ClientMap/properties/id")
 *     ),
 *     @OA\Parameter(
 *         name="fields",
 *         in="query",
 *         @OA\Schema(ref="#/components/schemas/StandardParams/properties/fields")
 *     ),
 *     @OA\Parameter(
 *         name="expand",
 *         in="query",
 *         @OA\Schema(type="string", enum={"xxxx"}, description="Query related models, using comma(,) be seperator")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(type="object", ref="#/components/schemas/ClientMap")
 *     )
 * )
 *
 * @OA\Post(
 *     path="/client-map",
 *     summary="Create",
 *     description="Create a record of ClientMap",
 *     operationId="createClientMap",
 *     tags={"ClientMap"},
 *     @OA\RequestBody(
 *         description="ClientMap object that needs to be added",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                  @OA\Property(property="id", ref="#/components/schemas/ClientMap/properties/id"),
 *                  @OA\Property(property="name", ref="#/components/schemas/ClientMap/properties/name"),
 *                  @OA\Property(property="data", ref="#/components/schemas/ClientMap/properties/data"),
 *                  @OA\Property(property="type", ref="#/components/schemas/ClientMap/properties/type"),
 *                  @OA\Property(property="created_by", ref="#/components/schemas/ClientMap/properties/created_by"),
 *                  @OA\Property(property="created_at", ref="#/components/schemas/ClientMap/properties/created_at"),
 *                  @OA\Property(property="updated_by", ref="#/components/schemas/ClientMap/properties/updated_by"),
 *                  @OA\Property(property="updated_at", ref="#/components/schemas/ClientMap/properties/updated_at")
 *             )
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(type="object", ref="#/components/schemas/ClientMap")
 *     )
 * )
 *
 * @OA\Patch(
 *     path="/client-map/{id}",
 *     summary="Update",
 *     description="Update a record of ClientMap",
 *     operationId="updateClientMap",
 *     tags={"ClientMap"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ClientMap id",
 *         required=true,
 *         @OA\Schema(ref="#/components/schemas/ClientMap/properties/id")
 *     ),
 *     @OA\RequestBody(
 *         description="ClientMap object that needs to be updated",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                  @OA\Property(property="id", ref="#/components/schemas/ClientMap/properties/id"),
 *                  @OA\Property(property="name", ref="#/components/schemas/ClientMap/properties/name"),
 *                  @OA\Property(property="data", ref="#/components/schemas/ClientMap/properties/data"),
 *                  @OA\Property(property="type", ref="#/components/schemas/ClientMap/properties/type"),
 *                  @OA\Property(property="created_by", ref="#/components/schemas/ClientMap/properties/created_by"),
 *                  @OA\Property(property="created_at", ref="#/components/schemas/ClientMap/properties/created_at"),
 *                  @OA\Property(property="updated_by", ref="#/components/schemas/ClientMap/properties/updated_by"),
 *                  @OA\Property(property="updated_at", ref="#/components/schemas/ClientMap/properties/updated_at")
 *             )
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(type="object", ref="#/components/schemas/ClientMap")
 *     )
 * )
 *
 * @OA\Delete(
 *     path="/client-map/{id}",
 *     summary="Delete",
 *     description="Delete a record of ClientMap",
 *     operationId="deleteClientMap",
 *     tags={"ClientMap"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ClientMap id",
 *         required=true,
 *         @OA\Schema(ref="#/components/schemas/ClientMap/properties/id")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation"
 *     )
 * )
 *
 * @version 1.0.0
 */
class ClientMapController extends ActiveApiController
{
    /**
     * @var string $modelClass
     */
    public $modelClass = 'app\models\ClientMap';

    /**
     * {@inherit}
     *
     * @return array<string, mixed>
     */
    public function actions()
    {
        $actions = parent::actions();

        // customize the data provider preparation with the "prepareDataProvider()" method
        $actions['index']['dataFilter'] = [
            'class' => 'yii\data\ActiveDataFilter',
            'searchModel' => $this->modelClass
        ];

        $actions['index']['pagination'] = [
            'class' => 'v1\components\Pagination'
        ];

        unset($actions['index']);

        return $actions;
    }

    /**
     * @OA\Post(
     *     path="/client-map/search",
     *     summary="Search",
     *     description="Search ClientMap by particular params",
     *     operationId="searchClientMap",
     *     tags={"ClientMap"},
     *     @OA\RequestBody(
     *         description="search ClientMap",
     *         required=false,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/xxxxxSearchModel")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *              @OA\Property(property="_data", type="array", @OA\Items(ref="#/components/schemas/ClientMap")),
     *              @OA\Property(property="_meta", type="object", ref="#/components/schemas/Pagination")
     *             )
     *         )
     *     )
     * )
     *
     * Search ClientMap
     *
     * @param xxxxxService $service
     * @return ActiveDataProvider
     */
    public function actionSearch(xxxxxService $service): ActiveDataProvider
    {
        try {
            $params = $this->getRequestParams();
            $query = $service->createSearchQuery($params);

            return new ActiveDataProvider([
                'query' => &$query,
                'pagination' => [
                    'class' => 'v1\components\Pagination',
                    'params' => $params
                ],
                'sort' => [
                    'enableMultiSort' => true,
                    'params' => $params
                ]
            ]);
        } catch (Throwable $e) {
            throw $e;
        }
    }
}
