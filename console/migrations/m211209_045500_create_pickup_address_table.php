<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pickup_address}}`.
 */
class m211209_045500_create_pickup_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pickup_address}}', [
            'id' => $this->bigPrimaryKey(),
            'address' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pickup_address}}');
    }
}
