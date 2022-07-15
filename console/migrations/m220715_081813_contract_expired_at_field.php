<?php

use yii\db\Migration;

/**
 * Class m220715_081813_contract_expired_at_field
 */
class m220715_081813_contract_expired_at_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("contract", "expired_at", $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("contract", "expired_at");
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220715_081813_contract_expired_at_field cannot be reverted.\n";

        return false;
    }
    */
}
