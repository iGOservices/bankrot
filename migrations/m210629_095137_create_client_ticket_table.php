<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client_ticket}}`.
 */
class m210629_095137_create_client_ticket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%client_ticket}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'name' => $this->string(50)->notNull(),
            'surname' => $this->string(50)->notNull(),
            'patronymic' => $this->string(50)->notNull(),
            'gender' => $this->smallInteger()->notNull(),
            'birthday' => $this->date()->notNull(),
            'birth_place' => $this->string(255)->notNull(),
            'inn' => $this->string(12)->notNull(),
            'snils' => $this->string(14)->notNull(),
            'registr_address' => $this->string(255)->notNull(),
            'fact_address' => $this->string(255)->notNull(),
            'mail'=> $this->string(255)->notNull(),
            'phone'=> $this->bigInteger()->notNull(),
            'is_ip'=> $this->smallInteger()->notNull(),
            'changed_fio'=> $this->string(255)->Null(),
            'facsimile' => $this->smallInteger()->notNull(),
            'created_at'=> $this->integer()->notNull(),
            'updated_at'=> $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%client_ticket}}');
    }
}
