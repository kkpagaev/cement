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
        $this->createTable('{{%import}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->string()->notNull(),
            'model_type' => $this->tinyInteger()->notNull(),
            'model_id' => $this->bigInteger(),
            'action' => $this->tinyInteger()->notNull(),
            'data' => $this->text(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%import}}');
    }
}
