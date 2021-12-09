<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contracts}}`.
 */
class m211209_045413_create_contracts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contracts}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contracts}}');
    }
}
