<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shipping_address_pickup_address}}`.
 */
class m220728_155024_create_shipping_address_pickup_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shipping_address_pickup_address}}', [
            'id' => $this->primaryKey(),
            'c1_id' => $this->string(),
            'shipping_address_id' => $this->string(),
            'pickup_address_id' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shipping_address_pickup_address}}');
    }
}
