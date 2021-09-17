<?php

use yii\db\Migration;

/**
 * Handles the creation of table `payment`.
 */
class m210914_112848_create_payment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('payment', [
            'id' => $this->primaryKey(),
            'payment_id' => $this->integer()->notNull(),
            'sum' => $this->integer()->notNull(),
            'sum_discount' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'promocode' => $this->integer()->null(),
            'created_at'=> $this->integer()->notNull(),
            'updated_at'=> $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('payment');
    }
}
