<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contract_product}}`.
 */
class m220721_025733_create_product_contract_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contract_product}}', [
            'id' => $this->primaryKey(),
            'c1_id' => $this->string(),
            'product_id' => $this->string(),
            'contract_id' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contract_product}}');
    }
}
