<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%passport}}`.
 */
class m210629_081324_add_ticket_id_column_to_passport_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('passport','ticket_id', $this->integer()->notNull()->unique()->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
