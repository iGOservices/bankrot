<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%property}}`.
 */
class m210708_060805_create_property_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%property}}', [
            'id' => $this->primaryKey(),
            'ticket_id' => $this->integer()->notNull(),
            'group' => $this->integer()->Null(),
            'property_type' => $this->string()->Null(),
            'property_view' => $this->integer()->Null(),
            'share' => $this->string()->Null(),
            'other_owners' => $this->string()->Null(),
            'active_name' => $this->string()->Null(),
            'square' => $this->string()->Null(),
            'reg_number' => $this->string()->Null(),
            'vin_number' => $this->string(17)->Null(),
            'date_sved' => $this->date()->Null(),
            'num_sved' => $this->string()->Null(),
            'coutry' => $this->string(255),
            'region' => $this->string(255),
            'district' => $this->string(255),
            'city' => $this->string(255),
            'street' => $this->string(255),
            'house' => $this->integer(),
            'corpus' => $this->integer(),
            'office' => $this->integer(),
            'post_index' => $this->integer(),
            'cost' => $this->integer(),
            'active_status' => $this->smallInteger()->Null(),
            'zalog_name' => $this->string(255),
            'zalog_post_index' => $this->integer(),
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
        $this->dropTable('{{%property}}');
    }
}
