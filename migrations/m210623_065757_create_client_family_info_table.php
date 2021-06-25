<?php

use yii\db\Migration;

/**
 * Handles the creation of table `client_family_info`.
 */
class m210623_065757_create_client_family_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('client_family_info', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('client_family_info');
    }
}
