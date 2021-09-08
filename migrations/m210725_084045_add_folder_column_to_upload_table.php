<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%upload}}`.
 */
class m210725_084045_add_folder_column_to_upload_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('upload','folder', $this->string(255)->Null()->after('name'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('upload', 'folder');
    }
}
