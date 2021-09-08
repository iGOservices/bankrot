<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ticket_status`.
 */
class m210902_082132_create_ticket_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ticket_status', [
            'id' => $this->primaryKey(),
            'ticket_id' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->defaultValue(0),
            'created_at'=> $this->integer()->notNull(),
            'updated_at'=> $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('ticket_status');
    }
}
