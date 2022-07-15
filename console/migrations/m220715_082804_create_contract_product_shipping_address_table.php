<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contract_product_shipping_address}}`.
 */
class m220715_082804_create_contract_product_shipping_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contract_product_shipping_address}}', [
            'id' => $this->primaryKey(),
            'c1_id' => $this->string(),
            'contract_id' => $this->string(),
            'product_id' => $this->string(),
            'shipping_address_id' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contract_product_shipping_address}}');
    }
}
