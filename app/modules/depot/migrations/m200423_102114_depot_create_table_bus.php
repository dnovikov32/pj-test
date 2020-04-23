<?php

use yii\db\Migration;

class m200423_102114_depot_create_table_bus extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bus}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'speed' => $this->integer()->notNull()->defaultValue(0),
        ], 'ENGINE=InnoDB CHARSET=utf8');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%bus}}');
    }

}
