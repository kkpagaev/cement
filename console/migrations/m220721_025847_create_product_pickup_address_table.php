<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_pickup_address}}`.
 */
class m220721_025847_create_product_pickup_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_pickup_address}}', [
            'id' => $this->primaryKey(),
            'c1_id' => $this->string(),
            'product_id' => $this->string(),
            'pickup_address_id' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_pickup_address}}');
    }
}
