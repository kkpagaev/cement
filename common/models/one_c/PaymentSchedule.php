<?php

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;
use Yii;

/**
 * This is the model class for table "payment_schedule".
 *
 * @property int $id
 * @property string $c1_id
 * @property string|null $contract_id
 * @property string|null $shipment_date
 * @property string|null $payment_date
 * @property int|null $payments_days
 * @property int|null $payments_sum
 * @property int|null $shipment_sum
 */
class PaymentSchedule extends Bridgeable1CActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_schedule';
    }

    public function getModelType(): int
    {
        return 15;
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shipment_date', 'payment_date'], 'safe'],
            [['payments_days', 'payments_sum', 'shipment_sum'], 'integer'],
            [['payments_days', 'payments_sum', 'shipment_sum'], 'required'],
            [['c1_id'], 'string'],
            [['contract_id'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contract_id' => 'Contract ID',
            'shipment_date' => 'Shipment Date',
            'payment_date' => 'Payment Date',
            'payments_days' => 'Payments Days',
            'payments_sum' => 'Payments Sum',
            'shipment_sum' => 'Shipment Sum',
        ];
    }
}
