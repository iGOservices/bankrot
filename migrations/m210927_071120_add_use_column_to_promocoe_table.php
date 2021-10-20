<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `promocoe`.
 */
class m210927_071120_add_use_column_to_promocoe_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('promocode','is_use', $this->smallInteger()->Null()->defaultValue(0)->after('service_id'));
        $this->addColumn('promocode','user_activate', $this->integer()->Null()->after('is_use'));
        $this->addColumn('promocode','period', $this->date()->Null()->after('is_use'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('promocode', 'is_use');
        $this->dropColumn('promocode', 'user_activate');
        $this->dropColumn('promocode', 'period');
    }
}
