<?php

use yii\db\Migration;

class m200423_111124_depot_create_test_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%driver}}', ['name', 'birth_date'], [
            ['Гришин Йоханес Сергеевич', '1983-03-20'],
            ['Соколов Назар Иванович', '1959-02-28'],
            ['Абрамов Игнат Сергеевич', '1967-01-02'],
            ['Степанов Артём Александрович', '1982-07-25'],
            ['Житар Илларион Брониславович', '1992-06-21'],
            ['Хижняк Камиль Михайлович', '1981-03-03'],
            ['Гуляев Устин Андреевич', '1978-08-18'],
            ['Котовский Родион Александрович', '1976-05-17'],
            ['Блинов Василий Брониславович', '1989-12-12'],
            ['Гришин Йоханес Сергеевич', '2001-06-23'],
            ['Иванов Иван Ивановчи', '2005-01-18'],
        ]);

        $this->batchInsert('{{%bus}}', ['name', 'speed'], [
            ['Neoplan', 100],
            ['Setra', 120],
            ['Mercedes', 140],
            ['King Long', 110],
        ]);

        $driverIds = $this->getDb()->createCommand("SELECT id FROM {{%driver}}")->queryColumn();
        $busIds = $this->getDb()->createCommand("SELECT id FROM {{%bus}}")->queryColumn();

        foreach ($driverIds as $driverId) {
            $busKeys = (array) array_rand($busIds, rand(1, count($busIds)));

            foreach ($busKeys as $busKey) {
                $this->insert('{{%driver_bus}}', array(
                    'driver_id' => $driverId,
                    'bus_id' => $busIds[$busKey],
                ));
            }
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%driver_bus}}');
        $this->delete('{{%bus}}');
        $this->delete('{{%driver}}');
    }


}
