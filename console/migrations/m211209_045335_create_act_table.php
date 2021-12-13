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
            'id' => $this->bigPrimaryKey(),
            'user_id' => $this->bigInteger()->notNull(),
            // add contract fk MARK!!!
            'contract_id' => $this->bigInteger()->notNull(),
            'number' => $this->integer(),
            'data_from' => $this->date(),
            'data_to' => $this->date(),
            'filepath' => $this->string(),
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
