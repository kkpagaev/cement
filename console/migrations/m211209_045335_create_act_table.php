<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%act}}`.
 */
class m211209_045335_create_act_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%act}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->bigInteger()->notNull(),
            'contract_id' => $this->bigInteger()->notNull(),
            'number' => $this->integer()->notNull(),
            'data_from' => $this->date()->notNull(),
            'data_to' => $this->date()->notNull(),
            'filepath' => $this->string()->notNull(),
        ]);
        $this->addForeignKey('act-user_id', 'act', 'user_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('act-user_id', 'act');
        $this->dropTable('{{%act}}');

    }
}
