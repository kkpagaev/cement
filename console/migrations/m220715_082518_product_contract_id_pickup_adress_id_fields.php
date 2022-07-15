<?php

use yii\db\Migration;

/**
 * Class m220715_082518_product_contract_id_pickup_adress_id_fields
 */
class m220715_082518_product_contract_id_pickup_adress_id_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("product", "contract_id", $this->string());
        $this->addColumn("product", "pickup_address_id", $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("product", "contract_id");
        $this->dropColumn("product", "pickup_address_id");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220715_082518_product_contract_id_pickup_adress_id_fields cannot be reverted.\n";

        return false;
    }
    */
}
