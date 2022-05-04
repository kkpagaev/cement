<?php

use yii\db\Migration;

/**
 * Class m220429_044258_order_consignee_phone_to_string
 */
class m220429_044258_order_consignee_phone_to_string extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('order', 'consignee_phone');
        $this->addColumn('order', 'consignee_phone', $this->string(32));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220429_044258_order_consignee_phone_to_string cannot be reverted.\n";

        return false;
    }
    */
}
