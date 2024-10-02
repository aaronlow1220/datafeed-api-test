<?php


namespace app\components\datafeed;

use AtelliTech\Yii2\Utils\AbstractRepository;
use app\models\ClientMap;

/**
 * This is a repository class for accessing client map.
 *
 * @author Aaron Low <aaron.low@atelli.ai>
 */
class ClientMapRepo extends AbstractRepository
{
    /**
     * @var string Model class. Required.
     */
    protected string $modelClass = ClientMap::class;
}
