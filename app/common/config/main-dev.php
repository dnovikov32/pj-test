<?php

return [
    'components' => [
        'cache' => [
            'class' => yii\caching\DummyCache::class,
        ],
        'mailer' => [
            'useFileTransport' => true,
        ],         
    ]
];