<?php

return [
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'components' => [
        'session' => [
            'name' => 'BACKEND',
        ],
        'request' => [
            'cookieValidationKey' => getenv('BACKEND_COOKIE_VALIDATION_KEY'),
            'parsers' => [
                'application/json' => \yii\web\JsonParser::class,
            ]
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '<module:\w+>/api/<controller:\w+>/<action:[\w-]+>' => '<module>/api/<controller>/<action>',
            ],
        ],
        'user' => [
            'identityClass' => \yii\web\User::class,
        ],
    ],
    'modules' => [
        'depot' => [
            'class' => modules\depot\backend\Module::class,
        ],
    ],
    'params' => [

    ],
];
