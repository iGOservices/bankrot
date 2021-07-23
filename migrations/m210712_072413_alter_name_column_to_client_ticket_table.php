<?php

use yii\db\Migration;

/**
 * Class m210712_072413_alter_name_column_to_client_ticket_table
 */
class m210712_072413_alter_name_column_to_client_ticket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('client_ticket', 'name', $this->string(50)->Null());
        $this->alterColumn('client_ticket', 'surname', $this->string(50)->Null());
        $this->alterColumn('client_ticket', 'patronymic', $this->string(50)->Null());
        $this->alterColumn('client_ticket', 'gender', $this->smallInteger()->Null());
        $this->alterColumn('client_ticket', 'birthday', $this->date()->Null());
        $this->alterColumn('client_ticket', 'birth_place', $this->string(255)->Null());
        $this->alterColumn('client_ticket', 'inn', $this->string(12)->Null());
        $this->alterColumn('client_ticket', 'snils', $this->string(14)->Null());
        $this->alterColumn('client_ticket', 'registr_address', $this->string(255)->Null());
        $this->alterColumn('client_ticket', 'fact_address', $this->string(255)->Null());
        $this->alterColumn('client_ticket', 'mail', $this->string(255)->unique()->Null());
        $this->alterColumn('client_ticket', 'phone', $this->bigInteger()->Null()->unique());
        $this->alterColumn('client_ticket', 'is_ip', $this->smallInteger()->Null());
        $this->alterColumn('client_ticket', 'changed_fio', $this->string(255)->Null());
        $this->alterColumn('client_ticket', 'facsimile', $this->smallInteger()->Null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210712_072413_alter_name_column_to_client_ticket_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210712_072413_alter_name_column_to_client_ticket_table cannot be reverted.\n";

        return false;
    }
    */
}
