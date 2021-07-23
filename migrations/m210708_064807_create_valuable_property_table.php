<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%valuable_property}}`.
 */
class m210708_064807_create_valuable_property_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%valuable_property}}', [
            'id' => $this->primaryKey(),
            'ticket_id' => $this->integer()->notNull(),
            'property_type' => $this->integer()->Null(),
            'name' => $this->string(255)->Null(),
            'cost' => $this->double()->Null(),
            'location' => $this->smallInteger()->Null(),
            'coutry' => $this->string(255),
            'region' => $this->string(255),
            'district' => $this->string(255),
            'city' => $this->string(255),
            'street' => $this->string(255),
            'house' => $this->integer(),
            'corpus' => $this->integer(),
            'office' => $this->integer(),
            'post_index' => $this->integer(),
            'org_name' => $this->string(255)->Null(),
            'dogovor_number' => $this->string(255)->Null(),
            'dogovor_date' => $this->date()->Null(),
            'active_status' => $this->smallInteger()->Null(),
            'zalog_name' => $this->string(255),
            'zalog_type' => $this->smallInteger()->Null(),
            'zalog_inn' => $this->integer(12),
            'zalog_address' => $this->string(255),
            'zalog_dogovor' => $this->string(255),
            'other' => $this->string(1000),
            'created_at'=> $this->integer()->notNull(),
            'updated_at'=> $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%valuable_property}}');
    }
}
