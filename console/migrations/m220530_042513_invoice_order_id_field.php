<?php

use yii\db\Migration;

/**
 * Class m220530_042513_invoice_order_id_field
 */
class m220530_042513_invoice_order_id_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('invoice', 'order_id', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('invoice', 'order_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220530_042513_invoice_order_id_field cannot be reverted.\n";

        return false;
    }
    */
}