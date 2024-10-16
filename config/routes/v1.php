<?php

return [
    'GET /apidoc' => 'v1/open-api-spec/index',
    [ // client
        'class' => 'yii\rest\UrlRule',
        'controller' => [
            'client' => 'v1/client',
        ],
        'except' => ['index', 'delete'],
        'extraPatterns' => [
            'OPTIONS <a:(search)>' => 'options',
            'POST <a:(search)>' => '<a>',
        ],
    ],
    [ // platform
        'class' => 'yii\rest\UrlRule',
        'controller' => [
            'platform' => 'v1/platform',
        ],
        'except' => ['index', 'delete'],
        'extraPatterns' => [
            'OPTIONS <a:(search)>' => 'options',
            'POST <a:(search)>' => '<a>',
        ],
    ],
    [ // Transformer
        'class' => 'yii\rest\UrlRule',
        'controller' => [
            'transformer' => 'v1/transformer',
        ],
        'except' => ['delete'],
        'extraPatterns' => [
            'OPTIONS <a:(transform|search)>' => 'options',
            'POST <a:(search)>' => '<a>',
            'GET <a:(transform-csv|transform-xml|transform-txt)>' => '<a>',
        ],
    ]
];