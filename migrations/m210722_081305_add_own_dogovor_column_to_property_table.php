<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%property}}`.
 */
class m210722_081305_add_own_dogovor_column_to_property_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('property','own_dogovor', $this->string(255)->Null()->after('cost'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('property', 'own_dogovor');
    }
}
