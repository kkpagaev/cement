<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%acts}}`.
 */
class m211209_045335_create_acts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%acts}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%acts}}');
    }
}
