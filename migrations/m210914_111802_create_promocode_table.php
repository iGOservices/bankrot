<?php

use yii\db\Migration;

/**
 * Handles the creation of table `promocode`.
 */
class m210914_111802_create_promocode_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('promocode', [
            'id' => $this->primaryKey(),
            'code' => $this->string(20)->notNull(),
            'discount' => $this->smallInteger()->notNull(),
            'service_id' => $this->smallInteger()->defaultValue(1),
            'active' => $this->smallInteger()->defaultValue(1),
            'created_at'=> $this->integer()->notNull(),
            'updated_at'=> $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('promocode');
    }
}
