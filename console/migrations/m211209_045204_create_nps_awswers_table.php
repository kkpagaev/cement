<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nps_awswers}}`.
 */
class m211209_045204_create_nps_awswers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nps_awswers}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%nps_awswers}}');
    }
}
