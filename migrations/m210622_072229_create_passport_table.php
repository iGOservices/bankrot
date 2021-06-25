<?php

use yii\db\Migration;

/**
 * Handles the creation of table `passport`.
 */
class m210622_072229_create_passport_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('passport', [
            'id' => $this->primaryKey(),
            'series' => $this->string(4)->notNull(),
            'number' => $this->string(6)->notNull(),
            'given' => $this->string(255)->notNull(),
            'code' => $this->string(6)->notNull(),
            'created_at'=> $this->integer()->notNull(),
            'updated_at'=> $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('passport');
    }
}
