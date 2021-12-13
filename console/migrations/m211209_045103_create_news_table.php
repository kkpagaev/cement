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
        $this->createTable('{{%news}}', [
            'id' => $this->bigPrimaryKey(),
            'title' => $this->string()->notNull(),
            'subtitle' => $this->string()->notNull(),
            'link' => $this->string()->notNull(),
            'image_filepath' => $this->string()->notNull(),
            'timestamp' => $this->datetime()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
