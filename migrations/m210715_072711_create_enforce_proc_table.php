<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%enforce_proc}}`.
 */
class m210715_072711_create_enforce_proc_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%enforce_proc}}', [
            'id' => $this->primaryKey(),
            'ticket_id' => $this->integer()->notNull(),
            'number' => $this->string()->null(),
            'date' => $this->date()->null(),
            'sum' => $this->double()->null(),
            'created_at'=> $this->integer()->notNull(),
            'updated_at'=> $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%enforce_proc}}');
    }
}
