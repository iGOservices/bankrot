<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bank}}`.
 */
class m210708_062218_create_bank_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bank}}', [
            'id' => $this->primaryKey(),
            'ticket_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->Null(),
            'post_address' => $this->string(255)->Null(),
            'number' => $this->string(100)->Null(),
            'bic' => $this->string(50)->Null(),
            'type' => $this->integer()->Null(),
            'currency'=> $this->integer()->Null(),
            'date_open' => $this->date()->Null(),
            'balance' => $this->integer()->Null(),
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
        $this->dropTable('{{%bank}}');
    }
}
