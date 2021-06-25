<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `directory`.
 */
class m210622_080211_add_id_column_to_directory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('directory','id',  $this->primaryKey()->after('name'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('directory', 'id');
    }
}
