<?php

use yii\db\Migration;

/**
 * Class m220527_145317_import_add_error_and_timestamp_fields
 */
class m220527_145317_import_add_error_and_timestamp_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('import', 'error', $this->text()->null());
        $this->addColumn('import', 'created_at', $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('import', 'error');
        $this->dropColumn('import', 'created_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220527_145317_import_add_error_and_timestamp_fields cannot be reverted.\n";

        return false;
    }
    */
}
