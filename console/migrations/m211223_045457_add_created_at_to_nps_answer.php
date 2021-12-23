<?php

use yii\db\Migration;

/**
 * Class m211223_045457_add_created_at_to_nps_answer
 */
class m211223_045457_add_created_at_to_nps_answer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('nps_answer', 'created_at', $this->timestamp()->defaultValue(new \yii\db\Expression("NOW()") ));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('nps_answer', 'created_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211223_045457_add_created_at_to_nps_answer cannot be reverted.\n";

        return false;
    }
    */
}
