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
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%report}}', [
            'id' => $this->bigPrimaryKey(),
            'c1_id' => $this->string(),
            'status' => $this->tinyInteger()->defaultValue(0),
            'user_id' => $this->string()->unsigned(),
            'filepath' => $this->string()
        ], $tableOptions); //
//        $this->addForeignKey('report-user_id', 'report', 'user_id', 'user', 'c1_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropForeignKey('report-user_id', 'report');
        $this->dropTable('{{%report}}');
    }
}
