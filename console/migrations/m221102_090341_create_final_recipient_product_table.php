<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%final_recipient_product}}`.
 */
class m221102_090341_create_final_recipient_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%final_recipient_product}}', [
            'id' => $this->primaryKey(),
            'c1_id' => $this->string(),
            'final_recipient_id' => $this->string(),
            'product_id' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%final_recipient_product}}');
    }
}
