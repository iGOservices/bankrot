<?php

use yii\db\Migration;

/**
 * Handles the creation of table `verify_code`.
 */
class m210924_070054_create_verify_code_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('verify_code', [
            'id' => $this->primaryKey(),
            'phone' => $this->bigInteger()->notNull(),
            'code' => $this->smallInteger(4)->notNull(),
            'ucaller_id' => $this->integer()->notNull(),
            'count' => $this->smallInteger()->defaultValue(0),
            'updated_at' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('verify_code');
    }
}
