<?php

use yii\db\Migration;

/**
 * Class m210902_070444_alter_phone_column_to_client_ticket_table
 */
class m210902_070444_alter_phone_column_to_client_ticket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('client_ticket', 'phone', $this->bigInteger()->null());
        $this->alterColumn('client_ticket', 'mail', $this->string(255)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210902_070444_alter_phone_column_to_client_ticket_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210902_070444_alter_phone_column_to_client_ticket_table cannot be reverted.\n";

        return false;
    }
    */
}
