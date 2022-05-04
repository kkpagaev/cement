<?php

use yii\db\Migration;

/**
 * Class m220421_214157_order_table_refactor
 */
class m220421_214157_order_table_refactor extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('order', 'shipment_point_id', 'shipping_address_id');
        $this->dropColumn('order', 'consignee_edrpou');
        $this->dropColumn('order', 'consignee_address');
        $this->dropColumn('order', 'destination_station');
        $this->dropColumn('order', 'c1_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // @toDO add down order items
        $this->renameColumn('order', 'shipping_address_id', 'shipment_point_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220421_214157_order_table_refactor cannot be reverted.\n";

        return false;
    }
    */
}
