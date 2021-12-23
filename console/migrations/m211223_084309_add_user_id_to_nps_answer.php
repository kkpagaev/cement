<?php

use yii\db\Migration;

/**
 * Class m211223_084309_add_user_id_to_nps_answer
 */
class m211223_084309_add_user_id_to_nps_answer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('nps_answer', 'user_id', $this->bigInteger());
        $this->addForeignKey('nps_answer-user_id', 'nps_answer', 'user_id', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('contract-user_id', 'contract');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211223_084309_add_user_id_to_nps_answer cannot be reverted.\n";

        return false;
    }
    */
}
