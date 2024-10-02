<?php

$params = require __DIR__.'/params.php';
$urlManager = require __DIR__.'/urlManager.php';

$config = [
    'id' => 'datafeed-api-v2',
    'basePath' => dirname(__DIR__),
    'timeZone' => 'Asia/Taipei',
    'bootstrap' => ['log'],
    'aliases' => [
        '@v1' => '@app/modules/v1',
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'cache' => 'cache',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => $params['db']['dsn'],
            'username' => $params['db']['username'],
            'password' => $params['db']['password'],
            'charset' => 'utf8mb4',
        ],
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'app\components\auth\UserIdentity',
            'enableAutoLogin' => false,
            'enableSession' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'AtelliTech\Yii2\Utils\Log\JsonFileLogTarget',
                    'levels' => ['error', 'warning'],
                    'enableRotation' => false,
                    'logFile' => '@runtime/logs/cli.log',
                    'maskVars' => ['LS_COLORS', '_SERVER.LS_COLORS', '_SERVER.SHELL', '_SERVER.PWD', '_SERVER.LOGNAME', '_SERVER.XDG_SESSION_TYPE', '_SERVER.MOTD_SHOWN', '_SERVER.HOME', '_SERVER.LANG', '_SERVER.SSH_CONNECTION', '_SERVER.LESSCLOSE', '_SERVER.XDG_SESSION_CLASS', '_SERVER.TERM', '_SERVER.LESSOPEN', '_SERVER.USER', '_SERVER.DISPLAY', '_SERVER.SHLVL', '_SERVER.XDG_SESSION_ID', '_SERVER.XDG_RUNTIME_DIR', '_SERVER.SSH_CLIENT', '_SERVER.XDG_DATA_DIRS', '_SERVER.PATH', '_SERVER.DBUS_SESSION_BUS_ADDRESS', '_SERVER.SSH_TTY', '_SERVER.OLDPWD', '_SERVER._', '_SERVER.PHP_SELF', '_SERVER.SCRIPT_NAME', '_SERVER.SCRIPT_FILENAME', '_SERVER.PATH_TRANSLATED', '_SERVER.DOCUMENT_ROOT'],
                ],
            ],
        ],
    ],
    'params' => &$params,
    'controllerMap' => [
        'genmodel' => [
            'class' => 'AtelliTech\Yii2\Utils\ModelGeneratorController',
            'db' => 'db',
            'path' => '@app/models',
            'namespace' => 'app\models',
        ],
        'genapi' => [
            'class' => 'AtelliTech\Yii2\Utils\ApiGeneratorController',
            'db' => 'db', // db comopnent id default: db
        ],
        'container' => [
            'class' => 'AtelliTech\Yii2\Utils\ContainerController',
            'defaultAction' => 'definitions',
            'sources' => [
            ],
        ],
    ],
];

return $config;
