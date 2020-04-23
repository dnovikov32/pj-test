<?php

namespace modules\depot\common\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property string $name
 * @property integer $speed
 */
class Bus extends ActiveRecord
{
    /**
     * @inheritDoc
     */
	public static function tableName() {
		return '{{%bus}}';
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

			['speed', 'filter', 'filter' => 'trim'],
			['speed', 'required'],
			['speed', 'integer'],
		];
	}

    /**
     * @inheritDoc
     */
	public function attributeLabels()
	{
		return [
            'id' => 'ID',
            'name' => 'Наименование',
            'speed' => 'Средняя скорость движения',
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
            'speed',
        ];
    }
}
