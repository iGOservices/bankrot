<?php

use yii\db\Migration;

/**
 * Class m210707_082007_alter_commitment_column_to_creditor_table
 */
class m210707_082007_alter_commitment_column_to_creditor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('creditor', 'commitment', $this->string()->Null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210707_082007_alter_commitment_column_to_creditor_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210707_082007_alter_commitment_column_to_creditor_table cannot be reverted.\n";

        return false;
    }
    */
}
