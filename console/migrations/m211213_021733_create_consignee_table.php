<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%consignee}}`.
 */
class m211213_021733_create_consignee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%consignee}}', [
            'id' => $this->bigPrimaryKey(),
            'fullname' => $this->string(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%consignee}}');
    }
}
