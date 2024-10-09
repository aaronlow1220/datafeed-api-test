<?php

namespace v1\controllers;

use Throwable;
use v1\components\ActiveApiController;
use yii\data\ActiveDataProvider;
use yii\web\HttpException;

/**
 * @OA\Tag(
 *     name="Platform",
 *     description="Everything about your Platform",
 * )
 *
 * @OA\Get(
 *     path="/platform/{id}",
 *     summary="Get",
 *     description="Get Platform by particular id",
 *     operationId="getPlatform",
 *     tags={"Platform"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Platform id",
 *         required=true,
 *         @OA\Schema(ref="#/components/schemas/Platform/properties/id")
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
 *         @OA\JsonContent(type="object", ref="#/components/schemas/Platform")
 *     )
 * )
 *
 * @OA\Post(
 *     path="/platform",
 *     summary="Create",
 *     description="Create a record of Platform",
 *     operationId="createPlatform",
 *     tags={"Platform"},
 *     @OA\RequestBody(
 *         description="Platform object that needs to be added",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                  @OA\Property(property="name", ref="#/components/schemas/Platform/properties/name"),
 *                  @OA\Property(property="data", ref="#/components/schemas/Platform/properties/data"),
 *             )
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(type="object", ref="#/components/schemas/Platform")
 *     )
 * )
 *
 * @OA\Patch(
 *     path="/platform/{id}",
 *     summary="Update",
 *     description="Update a record of Platform",
 *     operationId="updatePlatform",
 *     tags={"Platform"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Platform id",
 *         required=true,
 *         @OA\Schema(ref="#/components/schemas/Platform/properties/id")
 *     ),
 *     @OA\RequestBody(
 *         description="Platform object that needs to be updated",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                  @OA\Property(property="name", ref="#/components/schemas/Platform/properties/name"),
 *                  @OA\Property(property="data", ref="#/components/schemas/Platform/properties/data"),
 *             )
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(type="object", ref="#/components/schemas/Platform")
 *     )
 * )
 * 
 * @version 1.0.0
 */
class PlatformController extends ActiveApiController
{
    /**
     * @var string $modelClass
     */
    public $modelClass = 'app\models\Platform';

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
