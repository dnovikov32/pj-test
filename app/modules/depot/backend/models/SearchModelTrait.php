<?php

namespace modules\depot\backend\models;

use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;

trait SearchModelTrait
{
    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = $this->prepareQuery();

        $dataProvider = $this->prepareDataProvider($query);

        if (! ($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->prepareFilters($query);

        return $dataProvider;
    }

    /**
     * @return ActiveQuery
     */
    protected function prepareQuery()
    {
        return static::find();
    }

    /**
     * @param ActiveQuery $query
     * @return ActiveDataProvider
     */
    protected function prepareDataProvider($query)
    {
        return new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'name' => SORT_ASC
                ]
            ],
            'pagination' => [
                'defaultPageSize' => \Yii::$app->params['pagination']['defaultPageSize'],
            ],
        ]);
    }

    /**
     * @param ActiveQuery $query
     */
    protected function prepareFilters($query)
    {

    }

}
