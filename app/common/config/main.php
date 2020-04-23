<?php

return [
    'id' => 'pj.test',
    'language' => 'ru-RU',
    'sourceLanguage' => 'en-US',
    'charset' => 'utf-8',
    'extensions' => require(YS_PATH_VENDOR . '/yiisoft/extensions.php'),
    'vendorPath' => YS_PATH_VENDOR,
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'bootstrap' => [
        'log'
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => getenv('DB_DSN'),
            'username' => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD'),
            'charset' => 'utf8',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'formatter' => [
            'dateFormat' => 'php:d.m.Y',
        ],
        'session' => [
            'class' => \yii\web\Session::class,
            'cookieParams' => [
                'lifetime' => 7 * 24 * 60 * 60
            ]
        ],
    ],
    'modules' => [

    ],
    'params' => [

    ],
];