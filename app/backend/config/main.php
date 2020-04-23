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
            'identityClass' => yiicom\backend\models\AdminUser::class,
        ],
    ],
    'modules' => [

    ],
    'params' => [

    ],
];
