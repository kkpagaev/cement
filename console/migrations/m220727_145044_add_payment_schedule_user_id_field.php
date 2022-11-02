<?php

use yii\db\Migration;

/**
 * Class m220727_145044_add_payment_schedule_user_id_field
 */
class m220727_145044_add_payment_schedule_user_id_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('payment_schedule', 'user_id', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('payment_schedule', 'user_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220727_145044_add_payment_schedule_user_id_field cannot be reverted.\n";

        return false;
    }
    */
}
