<?php

use yii\db\Migration;

/**
 * Class m220505_065120_invoice_product_id_field
 */
class m220505_065120_invoice_product_id_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('invoice', 'product_id', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('invoice', 'product_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220505_065120_invoice_product_id_field cannot be reverted.\n";

        return false;
    }
    */
}
