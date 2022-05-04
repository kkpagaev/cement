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
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%order}}', [
            'id' => $this->bigPrimaryKey(),
            'c1_id' => $this->string(),
            'status' => $this->tinyInteger()->notNull(),
            'user_id' => $this->string(),
            'delivery_type' => $this->tinyInteger()->notNull(),
            'contract_id' => $this->string(),
            'pickup_address_id' => $this->string(),
            'shipment_point_id' => $this->string(),
            'consignee_fullname' => $this->string(),
            // MARK!!! integer? -> string
            'consignee_phone' => $this->integer(),
            'final_recipient_id' => $this->string(),
            'driver_info' => $this->string(1000),
            'driver_car_number' => $this->string(8),
            'driver_car_trailer_number' => $this->string(8),
            'unload_address' => $this->string(500),
            'consignee_id' => $this->string(),
            'consignee_edrpou' => $this->string(12),
            'consignee_address' => $this->string(1000),
            'consignee_code' => $this->string(5),
            'destination_station' => $this->string(1000),
            'consignee_branch' => $this->string(1000),
            'column_7' => $this->string(1000),
            'invoice_needed' => $this->tinyInteger(1)->notNull(),

        ], $tableOptions);
//        $this->addForeignKey('order-user_id', 'order', 'user_id', 'user', 'c1_id');
//        $this->addForeignKey('order-contract_id', 'order', 'contract_id', 'contract', 'c1_id');
//        $this->addForeignKey('order-pickup_address_id', 'order', 'pickup_address_id', 'pickup_address', 'c1_id');
//        $this->addForeignKey('order-shipment_point_id', 'order', 'shipment_point_id', 'shipping_address', 'c1_id');
//        $this->addForeignKey('order-final_recipient_id', 'order', 'final_recipient_id', 'final_recipient', 'c1_id');
//        $this->addForeignKey('order-consignee_id', 'order', 'consignee_id', 'consignee', 'c1_id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropForeignKey('order-user_id', 'order');
//        $this->dropForeignKey('order-contract_id', 'order');
//        $this->dropForeignKey('order-pickup_address_id', 'order');
//        $this->dropForeignKey('order-shipment_point_id', 'order');
//        $this->dropForeignKey('order-final_recipient_id', 'order');
//        $this->dropForeignKey('order-consignee_id', 'order');
        $this->dropTable('{{%order}}');


    }
}
