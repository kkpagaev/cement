<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_consignees}}`.
 */
class m211209_045631_create_order_consignees_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_consignees}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_consignees}}');
    }
}
