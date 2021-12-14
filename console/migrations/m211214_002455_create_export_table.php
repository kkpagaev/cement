<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%export}}`.
 */
class m211214_002455_create_export_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
/*        id: integer,
user_id: string,
model_type: integer enum,
model_id: nullable integer,
action: integer enum(0: create – створити, 1: update – оновити, 2: delete – видалити)
data: nullable string*/


        $this->createTable('{{%export}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->string()->notNull(),
            'model_type' => $this->tinyInteger()->notNull(),
            'model_id' => $this->bigInteger(),
            'action' => $this->tinyInteger()->notNull(),
            'data' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%export}}');
    }
}
