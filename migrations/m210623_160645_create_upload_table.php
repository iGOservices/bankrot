<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%upload}}`.
 */
class m210623_160645_create_upload_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('upload', [
            'id' => $this->primaryKey(),
            'model' => $this->string('100')->notNull(),
            'model_id' => $this->integer()->notNull(),
            'origin' => $this->string('255')->notNull(),
            'name' => $this->string('50')->notNull(),
            'ext' => $this->string('20')->notNull(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('upload');
    }
}
