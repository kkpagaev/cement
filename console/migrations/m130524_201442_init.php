<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%user}}', [
            'id' => $this->bigPrimaryKey(),
            'edrpou' => $this->string(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'middle_name' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32),
            'password' => $this->string()->notNull(),
            'phone' => $this->string(),
            'ur_address' => $this->string(),
            'fact_address' => $this->string(),
            'delivery_address' => $this->string(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
