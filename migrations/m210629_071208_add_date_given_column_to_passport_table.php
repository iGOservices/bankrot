<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%passport}}`.
 */
class m210629_071208_add_date_given_column_to_passport_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('passport','date_given', $this->date()->notNull()->after('given'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
