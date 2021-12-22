<?php

use yii\db\Migration;

/**
 * Class m211221_085812_add_is_banned_field_to_user
 */
class m211221_085812_add_is_banned_field_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'is_banned', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'is_banned');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211221_085812_add_is_banned_field_to_user cannot be reverted.\n";

        return false;
    }
    */
}
