<?php

namespace modules\depot\backend\models;

use yii\db\ActiveQuery;
use modules\depot\common\models\Driver;
use modules\depot\backend\models\SearchModelTrait;

class DriverSearch extends Driver
{
    use SearchModelTrait;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],

            [['name', 'birth_date'], 'safe'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    protected function prepareQuery()
    {
        return static::find()
            ->joinWith('buses');
    }

    /**
     * @param ActiveQuery $query
     */
    protected function prepareFilters($query)
    {
        $driverTable = self::tableName();

        $query->andFilterWhere([
            "$driverTable.id" => $this->id,
            "$driverTable.birth_date" => $this->birth_date,
        ]);

        $query->andFilterWhere(['LIKE', "$driverTable.name", $this->name]);
    }

}