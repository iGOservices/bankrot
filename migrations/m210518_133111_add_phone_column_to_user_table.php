<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m210518_133111_add_phone_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','phone', $this->bigInteger()->notNull()->unique()->after('email'));
        $this->alterColumn('user','phone', $this->bigInteger()->notNull()->unique());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'phone');
        $this->alterColumn('user','phone', $this->bigInteger()->notNull()->unique());
    }
}
