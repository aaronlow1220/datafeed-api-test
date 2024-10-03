<?php

return [
    'GET /apidoc' => 'v1/open-api-spec/index',
    [ // taxonomy-type
        'class' => 'yii\rest\UrlRule',
        'controller' => [
            'client-map' => 'v1/client-map',
        ],
        'except' => ['index', 'delete'],
        'extraPatterns' => [
            'OPTIONS <a:(search)>' => 'options',
            'POST <a:(search)>' => '<a>',
        ],
    ],
    [ // Test
        'class' => 'yii\rest\UrlRule',
        'controller' => [
            'transformer' => 'v1/transformer',
        ],
        'except' => ['delete'],
        'extraPatterns' => [
            'OPTIONS <a:(transform|search)>' => 'options',
            'POST <a:(search)>' => '<a>',
            'GET <a:(transform)>' => '<a>',
        ],
    ]
];