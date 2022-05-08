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
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%invoice}}', [
            'id' => $this->bigPrimaryKey(),
            // ASK MARK!!!
            'status' => $this->tinyInteger()->defaultValue(0),
            'user_id' => $this->string(),
            'number' => $this->string(),
            'data' => $this->date()->notNull(),
            'filepath' => $this->string(),
            // doesn't have a cement mark
        ], $tableOptions);
//        $this->addForeignKey('invoice-user_id', 'invoice', 'user_id', 'user', 'c1_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropForeignKey('invoice-user_id', 'invoice');
        $this->dropTable('{{%invoice}}');
    }
}
