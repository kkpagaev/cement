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
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%act}}', [
            'id' => $this->primaryKey(),
            'c1_id' => $this->string(),
            'user_id' => $this->string(),
            'contract_id' => $this->string(),
            'number' => $this->integer()->notNull(),
            'date_from' => $this->date()->notNull(),
            'data_to' => $this->date()->notNull(),
            'filepath' => $this->string(),
        ], $tableOptions);
//        $this->addForeignKey('act-user_id', 'act', 'user_id', 'user', 'c1_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropForeignKey('act-user_id', 'act');
        $this->dropTable('{{%act}}');

    }
}
