<?php

namespace modules\depot\backend\models;

use yii\db\ActiveQuery;
use yii\db\Expression;
use yii\data\ActiveDataProvider;
use modules\depot\common\models\Driver;
use modules\depot\backend\models\SearchModelTrait;

class DriverTimeSearch extends Driver
{
    use SearchModelTrait;

    const DAILY_WORK_HOURS_LIMIT = 8;

    /** @var string Name of departure city */
    public $from;

    /** @var string Name of city of arrival */
    public $to;

    /** @var integer Maximum bus speed available to the driver */
    public $max_speed;

    /** @var float travel time in days */
    public $travel_time;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['id', 'integer'],

            ['from', 'filter', 'filter' => 'trim'],
            ['from', 'required'],
            ['from', 'string', 'max' => 64],

            ['to', 'filter', 'filter' => 'trim'],
            ['to', 'required'],
            ['to', 'string', 'max' => 64],

            [['name', 'birth_date', 'travel_time'], 'safe'],
        ];
    }

    /**
     * @inheritDoc
     */
    public function fields()
    {
        return [
            'id',
            'name',
            'birth_date',
            'age',
            'travel_time',
        ];
    }

    /**
     * @return ActiveDataProvider
     */
    public function search()
    {
        $query = $this->prepareQuery();
        $dataProvider = $this->prepareDataProvider($query);
        $this->prepareFilters($query);

        return $dataProvider;
    }

    /**
     * @return ActiveQuery
     */
    protected function prepareQuery()
    {
        return self::find()

            ->addSelect('{{%driver}}.*')
            ->addSelect(new Expression("MAX({{%bus}}.speed) AS max_speed"))
            ->joinWith('buses')
            ->groupBy('{{%driver}}.id')
            ->orderBy(['max_speed' => SORT_DESC]);
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