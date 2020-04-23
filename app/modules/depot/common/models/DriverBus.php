<?php

namespace modules\depot\common\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property integer $driver_id
 * @property integer $bus_id
 */
class DriverBus extends ActiveRecord
{
    /**
     * @inheritDoc
     */
	public static function tableName() {
		return '{{%driver_bus}}';
	}

    /**
     * @inheritDoc
     */
	public function rules()
	{
		return [
            ['driver_id', 'required'],
            ['driver_id', 'integer'],

            ['bus_id', 'required'],
            ['bus_id', 'integer'],
		];
	}

    /**
     * @inheritDoc
     */
	public function attributeLabels()
	{
		return [
            'id' => 'ID',
            'driver_id' => 'ID водителя',
            'bus_id' => 'ID автобуса',
		];
	}

    /**
     * @inheritDoc
     */
    public function fields()
    {
        return [
            'id',
            'driver_id',
            'bus_id',
        ];
    }
}
