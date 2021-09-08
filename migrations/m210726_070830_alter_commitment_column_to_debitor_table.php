<?php

use yii\db\Migration;

/**
 * Class m210726_070830_alter_commitment_column_to_debitor_table
 */
class m210726_070830_alter_commitment_column_to_debitor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('debitor', 'commitment', $this->string()->Null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210726_070830_alter_commitment_column_to_debitor_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210726_070830_alter_commitment_column_to_debitor_table cannot be reverted.\n";

        return false;
    }
    */
}
