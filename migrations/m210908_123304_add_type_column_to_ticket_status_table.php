<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%ticket_status}}`.
 */
class m210908_123304_add_type_column_to_ticket_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('ticket_status','type', $this->smallInteger()->notNull()->defaultValue(0)->after('status'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('ticket_status', 'type');
    }
}
