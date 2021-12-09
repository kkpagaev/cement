<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shipping_adresses}}`.
 */
class m211209_045449_create_shipping_adresses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shipping_adresses}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shipping_adresses}}');
    }
}
