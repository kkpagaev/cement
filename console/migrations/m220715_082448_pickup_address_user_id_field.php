<?php

use yii\db\Migration;

/**
 * Class m220715_082448_pickup_address_user_id_field
 */
class m220715_082448_pickup_address_user_id_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("pickup_address", "user_id", $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("pickup_address", "user_id");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220715_082448_pickup_address_user_id_field cannot be reverted.\n";

        return false;
    }
    */
}
