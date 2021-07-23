<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%property}}`.
 */
class m210712_052129_add_zalog_inn_column_to_property_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('property','zalog_inn', $this->integer()->Null()->after('zalog_name'));
        $this->addColumn('property','zalog', $this->smallInteger()->Null()->after('zalog_dogovor'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
