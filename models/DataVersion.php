<?php

namespace app\models;

use yii\behaviors\AttributeTypecastBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * @OA\Schema(
 *   schema="DataVersion",
 *   title="DataVersion Model",
 *   description="This model is used to access data_version data",
 *   required={"id"},
 *   @OA\Property(property="id", type="integer", description="id #autoIncrement #pk")
 * )
 *
 * @version 1.0.0
 */
class DataVersion extends ActiveRecord
{
    /**
     * Return table name of data_version.
     *
     * @return string
     */
    public static function tableName()
    {
        return 'data_version';
    }

    /**
     * Use timestamp to store time of login, update and create
     *
     * @return array<int, mixed>
     */
    public function behaviors()
    {
        return [
            [
                'class' => AttributeTypecastBehavior::class,
                'typecastAfterValidate' => true,
                'typecastBeforeSave' => true,
                'typecastAfterFind' => true,
            ],
        ];
    }

    /**
     * rules
     *
     * @return array<int, mixed>
     */
    public function rules()
    {
        return [
            [[''], 'trim'],
            [['id'], 'integer']
        ];
    }


    /**
     * return extra fields
     *
     * @return string[]
     */
    public function extraFields()
    {
        return [];
    }
}
