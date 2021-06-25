<?php

use yii\db\Migration;

/**
 * Class m210518_134736_alter_email_column_to_user_table
 */
class m210518_134736_alter_email_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('user', 'email', $this->string()->Null()->unique());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210518_134736_alter_email_column_to_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210518_134736_alter_email_column_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
