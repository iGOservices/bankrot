<?php

use yii\db\Migration;

/**
 * Handles the creation of table `directory`.
 */
class m211006_055605_create_directory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('directory', [
            'id' => $this->primaryKey(),
            'type' => $this->smallInteger()->notNull(),
            'name' => $this->string(100)->notNull(),
            'title' => $this->string(255)->null(),
            'active' => $this->smallInteger()->defaultValue(1)->notNull(),
            'prompt' => $this->string(255)->null(),
            'prompt_active' => $this->smallInteger()->defaultValue(1)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('directory');
    }
}
