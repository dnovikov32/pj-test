<?php

use yii\db\Migration;

class m200423_102507_depot_create_table_driver_bus extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%driver_bus}}', [
            'id' => $this->primaryKey(),
            'driver_id' => $this->integer()->notNull(),
            'bus_id' => $this->integer()->notNull(),
        ], 'ENGINE=InnoDB CHARSET=utf8');

        $this->createIndex('{{%idx-unique-driver_id-bus_id}}',
            '{{%driver_bus}}',
            ['driver_id', 'bus_id'],
            true);

        $this->addForeignKey('{{%fk-driver_bus-driver}}',
            '{{%driver_bus}}', 'driver_id',
            '{{%driver}}', 'id',
            'RESTRICT', 'CASCADE');

        $this->addForeignKey('{{%fk-driver_bus-bus}}',
            '{{%driver_bus}}', 'bus_id',
            '{{%bus}}', 'id',
            'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('{{%fk-driver_bus-driver}}', '{{%driver_bus}}');
        $this->dropForeignKey('{{%fk-driver_bus-bus}}', '{{%driver_bus}}');

        $this->dropIndex('{{%idx-unique-driver_id-bus_id}}', '{{%driver_bus}}');

        $this->dropTable('{{%driver_bus}}');
    }
}
