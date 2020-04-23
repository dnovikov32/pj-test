<?php

return [
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'session' => [
            'name' => 'FRONTEND',
        ],
        'request' => [
            'cookieValidationKey' => getenv('FRONTEND_COOKIE_VALIDATION_KEY'),
            'parsers' => [
                'application/json' => yii\web\JsonParser::class,
            ]

        ],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'enableStrictParsing' => true,
			'rules' => [
                '<module:\w+>/api/<controller:[\w-]+>/<action:[\w-]+>' => '<module>/api/<controller>/<action>',
			]
		],
        'user' => [
            'identityClass' => \yii\web\User::class,
        ],
    ],
    'modules' => [
        'depot' => [
            'class' => modules\depot\frontend\Module::class,
        ],
    ],
    'params' => [

    ]
];