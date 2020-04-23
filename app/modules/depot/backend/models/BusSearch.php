<?php

namespace modules\depot\backend\models;

use yii\db\ActiveQuery;
use modules\depot\common\models\Bus;
use modules\depot\backend\models\SearchModelTrait;

class BusSearch extends Bus
{
    use SearchModelTrait;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['id', 'speed'], 'integer'],

            [['name'], 'safe'],
        ];
    }

    /**
     * @param ActiveQuery $query
     */
    protected function prepareFilters($query)
    {
        $busTable = self::tableName();

        $query->andFilterWhere([
            "$busTable.id" => $this->id,
            "$busTable.speed" => $this->speed,
        ]);

        $query->andFilterWhere(['LIKE', "$busTable.name", $this->name]);
    }

}