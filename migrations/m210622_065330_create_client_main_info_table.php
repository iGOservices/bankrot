<?php

use yii\db\Migration;

/**
 * Handles the creation of table `client_main_info`.
 */
class m210622_065330_create_client_main_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('client_main_info', [
            'id' => $this->primaryKey(),
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
            'passport_id'=> $this->integer()->notNull()->unique(),
            'inter_passsport_id'=> $this->integer()->notNull()->unique(),
            'mail'=> $this->string(255)->notNull()->unique(),
            'phone'=> $this->bigInteger()->notNull()->unique(),
            'is_ip'=> $this->smallInteger()->notNull(),
            'changed_fio'=> $this->string(255)->notNull(),
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
        $this->dropTable('client_main_info');
    }
}
