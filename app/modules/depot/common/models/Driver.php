<?php

namespace modules\depot\common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use modules\depot\common\models\Bus;
use modules\depot\common\models\DriverBus;

/**
 * @property integer $id
 * @property string $name
 * @property string $birth_date
 *
 * @property integer $age
 * @property Bus[] $buses
 * @property DriverBus[] $driverBuses
 */
class Driver extends ActiveRecord
{
    /**
     * @inheritDoc
     */
	public static function tableName() {
		return '{{%driver}}';
	}

    /**
     * @inheritDoc
     */
	public function rules()
	{
		return [
            ['name', 'filter', 'filter' => 'trim'],
            ['name', 'required'],
            ['name', 'string', 'max' => 255],

			['birth_date', 'filter', 'filter' => 'trim'],
			['birth_date', 'required'],
			['birth_date', 'date', 'format' => 'php:Y-m-d'],
		];
	}

    /**
     * @inheritDoc
     */
	public function attributeLabels()
	{
		return [
            'id' => 'ID',
            'name' => 'ФИО',
            'birth_date' => 'Дата рождения',
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
            'buses'
        ];
    }

    /**
     * I think it’s better to store this field in the database than to calculate every time
     * @return int
     * @throws \Exception
     */
    public function getAge()
    {
        $birthday = new \DateTime($this->birth_date);
        $today = new \DateTime('today');

        return $birthday->diff($today)->y;
    }

    /**
     * @return ActiveQuery
     */
    public function getBuses()
    {
        return $this->hasMany(Bus::class, ['id' => 'bus_id'])
            ->via('driverBuses');
    }

    /**
     * @return ActiveQuery
     */
    public function getDriverBuses()
    {
        return $this->hasMany(DriverBus::class, ['driver_id' => 'id']);
    }

}
