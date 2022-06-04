<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%export}}`.
 */
class m211214_002455_create_export_table extends Migration
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
        $this->createTable('{{%export}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->string(),
            'model_type' => $this->tinyInteger(),
            'model_id' => $this->string(),
            'action' => $this->tinyInteger(),
            'data' => $this->text(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%export}}');
    }
}
