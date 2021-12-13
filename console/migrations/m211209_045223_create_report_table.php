<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%report}}`.
 */
class m211209_045223_create_report_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%report}}', [
            'id' => $this->bigPrimaryKey(),
            // ASK MARK!!!
            'status' => $this->tinyInteger(),
            'user_id' => $this->bigInteger()->notNull(),
            'filepath' => $this->string()
        ]);
        $this->addForeignKey('report-user_id', 'report', 'user_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('report-user_id', 'report');
        $this->dropTable('{{%report}}');
    }
}
