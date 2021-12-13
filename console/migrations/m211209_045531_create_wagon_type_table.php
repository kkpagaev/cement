<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wagon_type}}`.
 */
class m211209_045531_create_wagon_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wagon_type}}', [
            'id' => $this->bigPrimaryKey(),
            'title' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%wagon_type}}');
    }
}
