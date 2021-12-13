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
// user_id – bigint user->id користувач договору
// is_read - boolean - чи прочитав користувач вже (поставити штатну іконку + відображати різні кольори для прочитаного та ні)
// title - varchar(255) - заголовок
// description - text - заголовок
// timestamp - timestamp - коли було сповіщення


        $this->createTable('{{%notification}}', [
            'id' => $this->bigPrimaryKey(),
            'user_id' => $this->bigInteger()->notNull(),
            'is_read' => $this->boolean()->defaultValue(false),
            'title' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'timestamp' => $this->datetime()->notNull(),
        ]);
        $this->addForeignKey('notification-user_id', 'notification', 'user_id', 'user', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('notification-user_id', 'notification');
        $this->dropTable('{{%notification}}');

    }
}
