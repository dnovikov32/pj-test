<?php

namespace modules\depot\backend\controllers\api;


use Yii;
use yii\httpclient\Client;
use yii\rest\Controller;
use yii\data\ActiveDataProvider;
use modules\depot\backend\models\DriverSearch;
use modules\depot\backend\models\DriverTimeSearch;
use modules\depot\common\client\GoogleMapClient;
use modules\depot\common\client\DummyHttpClient;

class DriverController extends Controller
{
    /**
     * @return ActiveDataProvider
     */
    public function actionList()
    {
        $searchModel = new DriverSearch();

        return $searchModel->search(['DriverSearch' => Yii::$app->request->queryParams]);
    }

    /**
     * @return DriverTimeSearch|ActiveDataProvider
     */
    public function actionTime()
    {
        $searchModel = new DriverTimeSearch();

        if (! ($searchModel->load(Yii::$app->request->queryParams, '') && $searchModel->validate())) {
            return $searchModel;
        }

        try {

//            $client = new Client();
            $client = new DummyHttpClient();

            $client = new GoogleMapClient($client, \Yii::$app->params['googleMapApiKey']);
            $distance = $client->getDistance($searchModel->from, $searchModel->to);

            $dataProvider = $searchModel->search();
            $drivers = $dataProvider->getModels();
            foreach ($drivers as $driver) {
                $driver->travel_time = round(($distance / $driver->max_speed) / DriverTimeSearch::DAILY_WORK_HOURS_LIMIT, 2);
            }

            return $dataProvider;

        } catch (\Exception $e) {
            $searchModel->addError('GoogleAPI', $e->getMessage());

            return $searchModel;
        }
    }
}
