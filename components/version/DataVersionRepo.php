<?php


namespace app\components\datafeed;

use AtelliTech\Yii2\Utils\AbstractRepository;
use app\models\DataVersion;

/**
 * This is a repository class for accessing data version.
 *
 * @author Aaron Low <aaron.low@atelli.ai>
 */
class DataVersionRepo extends AbstractRepository
{
    /**
     * @var string Model class. Required.
     */
    protected string $modelClass = DataVersion::class;
}
