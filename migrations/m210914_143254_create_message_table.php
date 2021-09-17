<?php

use yii\db\Migration;

/**
 * Handles the creation of table `message`.
 */
class m210914_143254_create_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('message', [
            'id' => $this->primaryKey(),
            'chat_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'admin_id' => $this->integer()->notNull(),
            'text' => $this->string(1000)->notNull(),
            'see' => $this->boolean()->defaultValue(0),
            'updated_at' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('message');
    }
}
