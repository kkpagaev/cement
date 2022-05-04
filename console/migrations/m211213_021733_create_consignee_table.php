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
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%consignee}}', [
            'id' => $this->bigPrimaryKey(),
            'c1_id' => $this->string(),
            'fullname' => $this->string()->notNull(),

        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%consignee}}');
    }
}
