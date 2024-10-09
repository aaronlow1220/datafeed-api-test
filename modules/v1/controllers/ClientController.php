<?php

namespace v1\controllers;

use Throwable;
use v1\components\ActiveApiController;
use yii\data\ActiveDataProvider;
use yii\web\HttpException;

/**
 * @OA\Tag(
 *     name="Client",
 *     description="Everything about your Client",
 * )
 * 
 * @OA\Get(
 *     path="/client/{id}",
 *     summary="Get",
 *     description="Get Client by particular id",
 *     operationId="getClient",
 *     tags={"Client"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Client id",
 *         required=true,
 *         @OA\Schema(ref="#/components/schemas/Client/properties/id")
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
 *         @OA\JsonContent(type="object", ref="#/components/schemas/Client")
 *     )
 * )
 *
 * @OA\Post(
 *     path="/client",
 *     summary="Create",
 *     description="Create a record of Client",
 *     operationId="createClient",
 *     tags={"Client"},
 *     @OA\RequestBody(
 *         description="Client object that needs to be added",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                  @OA\Property(property="name", ref="#/components/schemas/Client/properties/name"),
 *                  @OA\Property(property="data", ref="#/components/schemas/Client/properties/data"),
 *             )
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(type="object", ref="#/components/schemas/Client")
 *     )
 * )
 *
 * @OA\Patch(
 *     path="/client/{id}",
 *     summary="Update",
 *     description="Update a record of Client",
 *     operationId="updateClient",
 *     tags={"Client"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Client id",
 *         required=true,
 *         @OA\Schema(ref="#/components/schemas/Client/properties/id")
 *     ),
 *     @OA\RequestBody(
 *         description="Client object that needs to be updated",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                  @OA\Property(property="id", ref="#/components/schemas/Client/properties/id"),
 *                  @OA\Property(property="name", ref="#/components/schemas/Client/properties/name"),
 *                  @OA\Property(property="data", ref="#/components/schemas/Client/properties/data"),
 *                  @OA\Property(property="created_by", ref="#/components/schemas/Client/properties/created_by"),
 *                  @OA\Property(property="created_at", ref="#/components/schemas/Client/properties/created_at"),
 *                  @OA\Property(property="updated_by", ref="#/components/schemas/Client/properties/updated_by"),
 *                  @OA\Property(property="updated_at", ref="#/components/schemas/Client/properties/updated_at")
 *             )
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(type="object", ref="#/components/schemas/Client")
 *     )
 * )
 *
 * @OA\Delete(
 *     path="/client/{id}",
 *     summary="Delete",
 *     description="Delete a record of Client",
 *     operationId="deleteClient",
 *     tags={"Client"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Client id",
 *         required=true,
 *         @OA\Schema(ref="#/components/schemas/Client/properties/id")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation"
 *     )
 * )
 *
 * @version 1.0.0
 */
class ClientController extends ActiveApiController
{
    /**
     * @var string $modelClass
     */
    public $modelClass = 'app\models\Client';

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
}
