<?php

use yii\db\Migration;

class m200423_095444_depot_create_table_driver extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%driver}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'birth_date' => $this->date()->notNull(),
        ], 'ENGINE=InnoDB CHARSET=utf8');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%driver}}');
    }
}
