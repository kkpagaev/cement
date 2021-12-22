<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m211209_045103_create_news_table extends Migration
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
        $this->createTable('{{%news}}', [
            'id' => $this->bigPrimaryKey(),
            'title' => $this->string()->notNull(),
            'subtitle' => $this->string()->notNull(),
            'link' => $this->string(),
            'image_filepath' => $this->string()->notNull(),
            'timestamp' => $this->datetime()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
