<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment_schedule}}`.
 */
class m220623_105741_create_payment_schedule_table extends Migration
{
    /**
     * {@inheritdoc}
     * @Todo create payment table and model 
     */
    public function safeUp()
    {
        $this->createTable('{{%payment_schedule}}', [
            'id' => $this->primaryKey(),
            'c1_id' => $this->string(),
            'contract_id' => $this->string(),
            "shipment_date" => $this->date(),
            "payment_date" => $this->date(),
            "payments_days" => $this->integer(),
            "payments_sum" => $this->integer(),
            "shipment_sum" => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%payment_schedule}}');
    }
}
