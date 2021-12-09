<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pickup_adresses}}`.
 */
class m211209_045500_create_pickup_adresses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pickup_adresses}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pickup_adresses}}');
    }
}
