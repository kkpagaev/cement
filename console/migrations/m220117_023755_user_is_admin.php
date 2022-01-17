<?php

use yii\db\Migration;

/**
 * Class m220117_023755_user_is_admin
 */
class m220117_023755_user_is_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'is_admin', $this->boolean()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'is_admin');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220117_023755_user_is_admin cannot be reverted.\n";

        return false;
    }
    */
}
