<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reports}}`.
 */
class m211209_045223_create_reports_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reports}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reports}}');
    }
}
