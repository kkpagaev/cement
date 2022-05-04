<?php

use yii\db\Migration;

/**
 * Class m220421_223201_shipping_address_add_contact_id
 */
class m220421_223201_shipping_address_add_contact_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('shipping_address', 'contract_id', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('shipping_address', 'contract_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220421_223201_shipping_address_add_contact_id cannot be reverted.\n";

        return false;
    }
    */
}
