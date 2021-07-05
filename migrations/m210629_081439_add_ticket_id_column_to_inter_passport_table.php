<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%inter_passport}}`.
 */
class m210629_081439_add_ticket_id_column_to_inter_passport_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('inter_passport','ticket_id', $this->integer()->notNull()->unique()->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
