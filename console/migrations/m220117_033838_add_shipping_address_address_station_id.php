<?php

use yii\db\Migration;

/**
 * Class m220117_033838_add_shipping_address_address_station_id
 */
class m220117_033838_add_shipping_address_address_station_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->addColumn('shipping_address', 'address_station_id', $this->string());
//        $this->addForeignKey('shipping_address-address_station_id', 'shipping_address', 'address_station_id', 'station', 'c1_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropForeignKey('shipping_address','shipping_address-address_station_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220117_033838_add_shipping_address_address_station_id cannot be reverted.\n";

        return false;
    }
    */
}
