<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%final_recipient}}`.
 */
class m211213_021721_create_final_recipient_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%final_recipient}}', [
            'id' => $this->bigPrimaryKey(),
            'fullname' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%final_recipient}}');
    }
}
