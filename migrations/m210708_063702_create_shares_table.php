<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shares}}`.
 */
class m210708_063702_create_shares_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shares}}', [
            'id' => $this->primaryKey(),
            'ticket_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->Null(),
            'location' => $this->string(255)->Null(),
            'inn' => $this->string(12)->Null(),
            'company_capital' => $this->integer()->Null(),
            'share' => $this->string()->Null(),
            'nominal_cost' => $this->double()->Null(),
            'shares_count' => $this->integer()->Null(),
            'total_cost' => $this->double()->Null(),
            'dogovor_number' => $this->string(255)->Null(),
            'date' => $this->date()->Null(),
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
        $this->dropTable('{{%shares}}');
    }
}
