<?php

use yii\db\Migration;

/**
 * Handles the creation of table `service`.
 */
class m210914_112400_create_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('service', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'price' => $this->integer()->notNull(),
            'description' => $this->text(1000)->null(),
            'domen' => $this->string(255)->notNull(),
            'created_at'=> $this->integer()->notNull(),
            'updated_at'=> $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('service');
    }
}
