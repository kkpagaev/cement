<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wagon_types}}`.
 */
class m211209_045531_create_wagon_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wagon_types}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%wagon_types}}');
    }
}
