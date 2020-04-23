<?php

namespace modules\depot\backend\controllers\api;

use Yii;
use yii\rest\Controller;
use yii\data\ActiveDataProvider;
use modules\depot\backend\models\BusSearch;

class BusController extends Controller
{
    /**
     * @return ActiveDataProvider
     */
    public function actionList()
    {
        $searchModel = new BusSearch();

        return $searchModel->search(['BusSearch' => Yii::$app->request->queryParams]);
    }
}
