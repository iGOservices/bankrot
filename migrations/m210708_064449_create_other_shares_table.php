<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%other_shares}}`.
 */
class m210708_064449_create_other_shares_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%other_shares}}', [
            'id' => $this->primaryKey(),
            'ticket_id' => $this->integer()->notNull(),
            'creater' => $this->string(255),
            'type' => $this->smallInteger()->Null(),
            'total_count' => $this->integer()->Null(),
            'nominal_cost' => $this->double()->Null(),
            'other' => $this->string(1000),
            'created_at'=> $this->integer()->notNull(),
            'updated_at'=> $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%other_shares}}');
    }
}
