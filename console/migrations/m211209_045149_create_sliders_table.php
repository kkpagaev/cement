<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sliders}}`.
 */
class m211209_045149_create_sliders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sliders}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sliders}}');
    }
}
