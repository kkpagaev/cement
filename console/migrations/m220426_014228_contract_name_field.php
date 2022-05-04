<?php

use yii\db\Migration;

/**
 * Class m220426_014228_contract_name_field
 */
class m220426_014228_contract_name_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('contract', 'number', $this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('contract', 'number');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220426_014228_contract_name_field cannot be reverted.\n";

        return false;
    }
    */
}
