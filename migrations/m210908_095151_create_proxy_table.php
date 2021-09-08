<?php

use yii\db\Migration;

/**
 * Handles the creation of table proxy`.
 */
class m210908_095151_create_proxy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('proxy', [
            'id' => $this->primaryKey(),
            'ticket_id' => $this->integer()->notNull(),
            'cpo_id' => $this->integer()->notNull(),
            'proxy_number' => $this->string(255),
            'proxy_date_start' => $this->date(),
            'proxy_date_end' => $this->date(),
            'created_at'=> $this->integer()->notNull(),
            'updated_at'=> $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('proxy');
    }
}
