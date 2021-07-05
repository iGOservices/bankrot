<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%creditor}}`.
 */
class m210701_055343_create_creditor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%creditor}}', [
            'id' => $this->primaryKey(),
            'ticket_id' => $this->integer()->notNull(),
            'group' => $this->integer(),
            'commitment' => $this->integer(),
            'is_predprin'=> $this->smallInteger(),
            'statment' => $this->integer(),
            'name' => $this->string(255),
            'inn' => $this->string(12),
            'coutry' => $this->string(255),
            'region' => $this->string(255),
            'district' => $this->string(255),
            'city' => $this->string(255),
            'street' => $this->string(255),
            'house' => $this->integer(),
            'corpus' => $this->integer(),
            'flat' => $this->integer(),
            'post_index' => $this->integer(),
            'sum_statment' => $this->integer(),
            'sum_dolg' => $this->integer(),
            'forfeit' => $this->string(255),
            'base' => $this->integer(),
            'base_date' => $this->date(),
            'base_num' => $this->integer(),
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
        $this->dropTable('{{%creditor}}');
    }
}
