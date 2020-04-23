<?php

return [
    'bootstrap' => ['debug'],
    'components' => [
        'assetManager' => [
            'linkAssets' => false,
            'forceCopy' => true,
        ],
    ],
    'modules' => [
        'debug' => [
            'class' => yii\debug\Module::class,
            'allowedIPs' => ['*']
            //'allowedIPs' => ['127.0.0.1', '::1']
        ],
    ],
];