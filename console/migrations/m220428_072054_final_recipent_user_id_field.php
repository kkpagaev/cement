<?php

use yii\db\Migration;

/**
 * Class m220428_072054_final_recipent_user_id_field
 */
class m220428_072054_final_recipent_user_id_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('final_recipient', 'user_id', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('final_recipient', 'user_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220428_072054_final_recipent_user_id_field cannot be reverted.\n";

        return false;
    }
    */
}
