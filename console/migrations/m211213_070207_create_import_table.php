<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%import}}`.
 */
class m211213_070207_create_import_table extends Migration
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
        $this->createTable('{{%import}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->string()->notNull(),
            'model_type' => $this->tinyInteger()->notNull(),
            'model_id' => $this->string(),
            'action' => $this->tinyInteger()->notNull(),
            'data' => $this->text(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%import}}');
    }
}
