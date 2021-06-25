<?php

use yii\db\Migration;

/**
 * Handles the creation of table `directory`.
 */
class m210622_073926_create_directory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('directory', [
            'name' => $this->smallInteger()->defaultValue(1)->notNull(),
            'surname' => $this->smallInteger()->defaultValue(1)->notNull(),
            'patronymic' => $this->smallInteger()->defaultValue(1)->notNull(),
            'gender' => $this->smallInteger()->defaultValue(1)->notNull(),
            'birthday' => $this->smallInteger()->defaultValue(1)->notNull(),
            'birth_place' => $this->smallInteger()->defaultValue(1)->notNull(),
            'inn' => $this->smallInteger()->defaultValue(1)->notNull(),
            'snils' => $this->smallInteger()->defaultValue(1)->notNull(),
            'registr_address' => $this->smallInteger()->defaultValue(1)->notNull(),
            'fact_address' => $this->smallInteger()->defaultValue(1)->notNull(),
            'passport_id'=> $this->smallInteger()->defaultValue(1)->notNull(),
            'inter_passsport_id'=> $this->smallInteger()->defaultValue(1)->notNull(),
            'mail'=> $this->smallInteger()->defaultValue(1)->notNull(),
            'phone'=> $this->smallInteger()->defaultValue(1)->notNull(),
            'is_ip'=> $this->smallInteger()->defaultValue(1)->notNull(),
            'changed_fio'=> $this->smallInteger()->defaultValue(1)->notNull(),
            'facsimile' => $this->smallInteger()->defaultValue(1)->notNull(),
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
