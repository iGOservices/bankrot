<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%family}}`.
 */
class m210715_055530_create_family_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%family}}', [
            'id' => $this->primaryKey(),
            'ticket_id' => $this->integer()->notNull(),
            'type' => $this->integer()->Null(),
            'name' => $this->string(50)->Null(),
            'surname' => $this->string(50)->Null(),
            'patronymic' => $this->string(50)->Null(),
            'birthday' => $this->date()->Null(),
            'inn' => $this->string(12)->Null(),
            'birth_country' => $this->smallInteger()->null(),
            'birth_series' => $this->string(10)->Null(),
            'birth_number' => $this->string(20)->Null(),
            'birth_date' => $this->date()->Null(),
            'birth_number_act' => $this->string()->Null(),
            'birth_number_act_date' => $this->date()->Null(),
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
        $this->dropTable('{{%family}}');
    }
}
