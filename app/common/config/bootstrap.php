<?php

Yii::setAlias('base', YS_PATH_BASE);
Yii::setAlias('common', YS_PATH_APP . '/common');
Yii::setAlias('frontend', YS_PATH_APP . '/frontend');
Yii::setAlias('backend', YS_PATH_APP . '/backend');
Yii::setAlias('console', YS_PATH_APP . '/console');
Yii::setAlias('modules', YS_PATH_APP . '/modules');
Yii::setAlias('migrations', YS_PATH_APP . '/migrations');
Yii::setAlias('vendor', YS_PATH_APP . '/vendor');
Yii::setAlias('storage',  YS_PATH_BASE . '/storage');
Yii::setAlias('frontendWebroot', '@frontend/web');
Yii::setAlias('backendWebroot', '@backend/web');
Yii::setAlias('frontendWeb', getenv('FRONTEND_WEB'));
Yii::setAlias('backendWeb', getenv('BACKEND_WEB'));
