<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%brak}}`.
 */
class m210715_061633_create_brak_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%brak}}', [
            'id' => $this->primaryKey(),
            'ticket_id' => $this->integer()->notNull(),
            'series' => $this->string(10)->Null(),
            'number' => $this->string(20)->Null(),
            'date' => $this->date()->Null(),
            'number_act' => $this->string()->Null(),
            'number_act_date' => $this->date()->Null(),
            'given' => $this->string(255)->Null(),
            'created_at'=> $this->integer()->notNull(),
            'updated_at'=> $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%brak}}');
    }
}
