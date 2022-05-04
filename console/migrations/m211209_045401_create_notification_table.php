<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notification}}`.
 */
class m211209_045401_create_notification_table extends Migration
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
        $this->createTable('{{%notification}}', [
            'id' => $this->bigPrimaryKey(),
            'c1_id' => $this->string(),
            'user_id' => $this->string(),
            'is_read' => $this->boolean()->defaultValue(false),
            'title' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'timestamp' => $this->datetime()->notNull(),
        ], $tableOptions);
//        $this->addForeignKey('notification-user_id', 'notification', 'user_id', 'user', 'c1_id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropForeignKey('notification-user_id', 'notification');
        $this->dropTable('{{%notification}}');

    }
}
