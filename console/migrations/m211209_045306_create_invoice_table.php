<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%invoice}}`.
 */
class m211209_045306_create_invoice_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%invoice}}', [
            'id' => $this->bigPrimaryKey(),
            // ASK MARK!!!
            'status' => $this->tinyInteger(),
            'user_id' => $this->bigInteger()->notNull(),
            'number' => $this->integer(),
            // MARK!!!
            'data' => $this->date(),
            'filepath' => $this->string(),
            // doesn't have a cement mark
        ]);
        $this->addForeignKey('invoice-user_id', 'invoice', 'user_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('invoice-user_id', 'invoice');
        $this->dropTable('{{%invoice}}');
    }
}
