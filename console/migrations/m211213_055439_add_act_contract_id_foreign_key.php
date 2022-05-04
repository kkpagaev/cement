<?php

use yii\db\Migration;

/**
 * Class m211213_055439_add_act_contract_id_foreigh_key
 */
class m211213_055439_add_act_contract_id_foreign_key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //$this->addForeignKey('act-contract_id', 'act', 'contract_id', 'contract', 'c1_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //$this->dropForeignKey('act-contract_id', 'act');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211213_055439_add_act_contract_id_foreigh_key cannot be reverted.\n";

        return false;
    }
    */
}
