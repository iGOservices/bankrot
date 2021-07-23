<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%client_ticket}}`.
 */
class m210720_052900_add_is_work_column_to_client_ticket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('client_ticket','is_work', $this->smallInteger()->Null()->after('is_ip'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('client_ticket','is_work');
    }
}
