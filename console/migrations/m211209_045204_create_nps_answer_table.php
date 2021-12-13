<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nps_answer}}`.
 */
class m211209_045204_create_nps_answer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nps_answer}}', [
            'id' => $this->bigPrimaryKey(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%nps_answer}}');
    }
}
