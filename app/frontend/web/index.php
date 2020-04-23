<?php

define('YS_PATH_BASE',  __DIR__.'/../../../');
define('YS_PATH_APP', YS_PATH_BASE . '/app');
define('YS_PATH_VENDOR', YS_PATH_BASE . '/app/vendor');

require(YS_PATH_VENDOR . '/autoload.php');
require(YS_PATH_APP . '/common/config/env.php');

defined('YII_ENV') || define('YII_ENV', getenv('YII_ENV'));
defined('YII_DEBUG') || define('YII_DEBUG', getenv('YII_DEBUG') == 'true');

require(YS_PATH_VENDOR . '/yiisoft/yii2/Yii.php');
require(YS_PATH_APP . '/common/config/bootstrap.php');
require(YS_PATH_APP . '/frontend/config/bootstrap.php');

$config = \yii\helpers\ArrayHelper::merge(
    require(YS_PATH_APP . '/common/config/main.php'),
    require(YS_PATH_APP . '/common/config/main-'.YII_ENV.'.php'),
    require(YS_PATH_APP . '/frontend/config/main.php'),
    require(YS_PATH_APP . '/frontend/config/main-'.YII_ENV.'.php')
);

(new yii\web\Application($config))->run(); 
