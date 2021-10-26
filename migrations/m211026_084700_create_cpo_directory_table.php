<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cpo_directory`.
 */
class m211026_084700_create_cpo_directory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cpo_directory', [
            'id' => $this->primaryKey(),
            'recipient' => $this->string(500)->notNull(),
            'recipient_inn' => $this->bigInteger()->notNull(),
            'recipient_kpp' => $this->bigInteger()->notNull(),
            'checking_account' => $this->string(20)->notNull(),
            'bik' => $this->bigInteger()->notNull(),
            'bank' => $this->string(500)->notNull(),
            'correspondent_account' => $this->string(20)->notNull(),
            'kbk' => $this->string(20)->notNull(),
            'oktmo' => $this->bigInteger()->notNull(),
            'payment_name' => $this->string(500)->null(),
            'updated_at' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cpo_directory');
    }
}
