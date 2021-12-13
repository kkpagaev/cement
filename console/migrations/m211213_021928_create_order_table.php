<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m211213_021928_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->bigPrimaryKey(),
            'status' => $this->tinyInteger(),
            'user_id' => $this->bigInteger()->notNull(),
            'delivery_type' => $this->tinyInteger()->notNull(),
            'contract_id' => $this->bigInteger()->notNull(),
            'pickup_address_id' => $this->bigInteger(),
            'shipment_point_id' => $this->bigInteger(),
            'consignee_fullname' => $this->string(),
            // MARK!!! integer? -> string
            'consignee_phone' => $this->integer(),
            'final_recipient_id' => $this->bigInteger(),
            'driver_info' => $this->string(1000),
            'driver_car_number' => $this->string(8),
            'driver_car_trailer_number' => $this->string(8),
            'unload_address' => $this->string(500),
            'consignee_id' => $this->bigInteger(),
            'consignee_edrpou' => $this->string(12),
            'consignee_address' => $this->string(1000),
            'consignee_code' => $this->string(5),
            'destination_station' => $this->string(1000),
            'consignee_branch' => $this->string(1000),
            'columnt_7' => $this->string(1000),
            'invoice_needed' => $this->tinyInteger(1),

        ]);
        $this->addForeignKey('order-user_id', 'order', 'user_id', 'user', 'id');
        $this->addForeignKey('order-contract_id', 'order', 'contract_id', 'contract', 'id');
        $this->addForeignKey('order-pickup_address_id', 'order', 'pickup_address_id', 'pickup_address', 'id');
        $this->addForeignKey('order-shipment_point_id', 'order', 'shipment_point_id', 'shipping_address', 'id');
        $this->addForeignKey('order-final_recipient_id', 'order', 'final_recipient_id', 'final_recipient', 'id');
        $this->addForeignKey('order-consignee_id', 'order', 'consignee_id', 'consignee', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('order-user_id', 'order');
        $this->dropForeignKey('order-contract_id', 'order');
        $this->dropForeignKey('order-pickup_address_id', 'order');
        $this->dropForeignKey('order-shipment_point_id', 'order');
        $this->dropForeignKey('order-final_recipient_id', 'order');
        $this->dropForeignKey('order-consignee_id', 'order');
        $this->dropTable('{{%order}}');


    }
}
