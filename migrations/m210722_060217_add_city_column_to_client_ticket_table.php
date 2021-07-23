<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%client_ticket}}`.
 */
class m210722_060217_add_city_column_to_client_ticket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('client_ticket','region', $this->string(255)->Null()->after('snils'));
        $this->addColumn('client_ticket','district', $this->string(255)->Null()->after('region'));
        $this->addColumn('client_ticket','city', $this->string(100)->Null()->after('district'));
        $this->addColumn('client_ticket','selo', $this->string(100)->Null()->after('city'));
        $this->addColumn('client_ticket','street', $this->string(100)->Null()->after('selo'));
        $this->addColumn('client_ticket','house', $this->integer()->Null()->after('street'));
        $this->addColumn('client_ticket','corpuse', $this->integer()->Null()->after('house'));
        $this->addColumn('client_ticket','flat', $this->integer()->Null()->after('corpuse'));
        $this->dropColumn('client_ticket', 'registr_address');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('client_ticket','region');
        $this->dropColumn('client_ticket','district');
        $this->dropColumn('client_ticket','city');
        $this->dropColumn('client_ticket','selo');
        $this->dropColumn('client_ticket','street');
        $this->dropColumn('client_ticket','house');
        $this->dropColumn('client_ticket','corpuse');
        $this->dropColumn('client_ticket','flat');


    }
}
