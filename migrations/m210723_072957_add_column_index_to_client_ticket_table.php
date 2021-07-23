<?php

use yii\db\Migration;

/**
 * Class m210723_072957_add_column_index_to_client_ticket_table
 */
class m210723_072957_add_column_index_to_client_ticket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('client_ticket','index', $this->integer()->Null()->after('flat'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210723_072957_add_column_index_to_client_ticket_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210723_072957_add_column_index_to_client_ticket_table cannot be reverted.\n";

        return false;
    }
    */
}
