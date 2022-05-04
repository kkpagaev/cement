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
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%shipping_address}}', [
            'id' => $this->bigPrimaryKey(),
            'c1_id' => $this->string(),
            //'user_id' => $this->bigInteger()->notNull(),
            'delivery_type' => $this->tinyInteger(),
            'address_auto' => $this->string(),
        ], $tableOptions);
       // $this->addForeignKey('shipping_address-user_id', 'shipping_address', 'user_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       // $this->dropForeignKey('shipping_address-user_id', 'shipping_address');
        $this->dropTable('{{%shipping_address}}');

    }
}
