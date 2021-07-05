<?php

use yii\db\Migration;

/**
 * Handles the creation of table `inter_passport`.
 */
class m210629_073717_create_inter_passport_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('inter_passport', [
            'id' => $this->primaryKey(),
            'series' => $this->string(2)->notNull(),
            'number' => $this->string(7)->notNull(),
            'given' => $this->string(255)->notNull(),
            'date_given' => $this->date()->notNull(),
            'period' => $this->date()->notNull(),
            'created_at'=> $this->integer()->notNull(),
            'updated_at'=> $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('inter_passport');
    }
}
