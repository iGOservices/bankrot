<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nalog}}`.
 */
class m210708_070937_create_nalog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nalog}}', [
            'id' => $this->primaryKey(),
            'ticket_id' => $this->integer()->notNull(),
            'work' => $this->string(255)->Null(),
            'year' => $this->integer()->Null(),
            'income' => $this->double()->Null(),
            'nalog' => $this->double()->Null(),
            'created_at'=> $this->integer()->notNull(),
            'updated_at'=> $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%nalog}}');
    }
}
