<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shipping_address}}`.
 */
class m211209_045449_create_shipping_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shipping_address}}', [
            'id' => $this->bigPrimaryKey(),
            'user_id' => $this->bigInteger()->notNull(),
            'city' => $this->string(),
            'address' => $this->string(),
        ]);
        $this->addForeignKey('shipping_address-user_id', 'shipping_address', 'user_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('shipping_address-user_id', 'shipping_address');
        $this->dropTable('{{%shipping_address}}');

    }
}
