<?php

namespace v1\controllers;

use Throwable;
use v1\components\ActiveApiController;
use yii\data\ActiveDataProvider;
use v1\components\client\ClientMapSearchService;
use yii\web\HttpException;
use InvalidArgumentException;
use app\modules\v1\Module;

/**
 * @OA\Tag(
 *     name="ClientMap",
 *     description="Everything about your ClientMap",
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
 *                  @OA\Property(property="name", ref="#/components/schemas/ClientMap/properties/name"),
 *                  @OA\Property(property="data", ref="#/components/schemas/ClientMap/properties/data"),
 *                  @OA\Property(property="type", ref="#/components/schemas/ClientMap/properties/type")
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
 *                  @OA\Property(property="name", ref="#/components/schemas/ClientMap/properties/name"),
 *                  @OA\Property(property="data", ref="#/components/schemas/ClientMap/properties/data"),
 *                  @OA\Property(property="type", ref="#/components/schemas/ClientMap/properties/type")
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
 * @version 1.0.0
 */
class ClientMapController extends ActiveApiController
{
    /**
     * @var string $modelClass
     */
    public $modelClass = 'app\models\ClientMap';

    /**
     * constructor.
     *
     * @param string $id
     * @param Module $module
     * @param ClientMapSearchService $clientMapSearchService
     * @param array<string, mixed> $config
     *
     * @return void
     */
    public function __construct($id, $module, private ClientMapSearchService $clientMapSearchService, $config = [])
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
     *             @OA\Schema(ref="#/components/schemas/ClientMapSearch")
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
     * @return ActiveDataProvider
     */
    public function actionSearch(): ActiveDataProvider
    {
        try {
            $params = $this->getRequestParams();

            return $this->clientMapSearchService->createDataProvider($params);
        } catch (InvalidArgumentException $e) {
            throw new HttpException(400, $e->getMessage());
        } catch (Throwable $e) {
            throw $e;
        }
    }
}
