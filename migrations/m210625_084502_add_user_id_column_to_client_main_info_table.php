<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%client_main_info}}`.
 */
class m210625_084502_add_user_id_column_to_client_main_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('client_main_info','user_id', $this->integer()->notNull()->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('client_main_info', 'user_id');
    }
}
