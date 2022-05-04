<?php

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;
use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $status
 * @property int $user_id
 * @property int $delivery_type
 * @property int $contract_id
 * @property int|null $pickup_address_id
 * @property int|null $shipping_address_id
 * @property string|null $consignee_fullname
 * @property int|null $consignee_phone
 * @property int|null $final_recipient_id
 * @property string|null $driver_info
 * @property string|null $driver_car_number
 * @property string|null $driver_car_trailer_number
 * @property string|null $unload_address
 * @property int|null $consignee_id
 * @property string|null $consignee_code
 * @property string|null $consignee_branch
 * @property string|null $column_7
 * @property int $invoice_needed
 *
 * @property Consignee $consignee
 * @property Contract $contract
 * @property FinalRecipient $finalRecipient
 * @property OrderItems[] $orderItems
 * @property PickupAddress $pickupAddress
 * @property ShippingAddress $shipmentPoint
 * @property User $user
 */
class Order extends Bridgeable1CActiveRecord
{
    function getModelType(): int
    {
        return 0;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'delivery_type', 'contract_id', 'invoice_needed'], 'required'],
            [['status', 'delivery_type', 'invoice_needed'], 'integer'],
            [['user_id', 'contract_id', 'pickup_address_id', 'shipping_address_id', 'final_recipient_id', 'consignee_id'], 'string', 'min' => 1,],
            [['consignee_fullname'], 'string', 'min' => 5, 'max' => 255],
            [['driver_info', 'consignee_branch', 'column_7'], 'string', 'min' => 2, 'max' => 1000],
            [['driver_car_number', 'driver_car_trailer_number'], 'string', 'min' => 2, 'max' => 8],
            [['unload_address'], 'string', 'min' => 4, 'max' => 500],
            [['consignee_code'], 'string', 'min' => 5, 'max' => 5],
            [['status'], 'default', 'value' => 0],
            [[
                'contract_id',
                'pickup_address_id',
                'shipping_address_id',
                'consignee_fullname',
                'consignee_phone',
                'final_recipient_id'
            ], 'required', 'on' => self::SCENARIO_AUTO],
            [['consignee_phone'], 'string', 'min' => 9, 'max'=> 32],
            [[
                'contract_id',
                'shipping_address_id',
                'pickup_address_id',
                'consignee_id',
                'consignee_code',
                'consignee_branch',
                'column_7',], 'required', 'on' => self::SCENARIO_RAILWAY],
            [[
                'contract_id',
                'pickup_address_id',
                'driver_info',
                'driver_car_number',
                'driver_car_trailer_number',
                'unload_address',
            ], 'required', 'on' => self::SCENARIO_SELF_PICKUP],

        ];
    }

    const SCENARIO_AUTO = 0;
    const SCENARIO_SELF_PICKUP = 1;
    const SCENARIO_RAILWAY = 2;

    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => [],
            self::SCENARIO_SELF_PICKUP => [
                'contract_id',
                'pickup_address_id',
                'driver_info',
                'driver_car_number',
                'driver_car_trailer_number',
                'unload_address',
            ],
            self::SCENARIO_AUTO => [
                'contract_id',
                'pickup_address_id',
                'shipping_address_id',
                'consignee_fullname',
                'consignee_phone',
                'final_recipient_id'
            ],
            self::SCENARIO_RAILWAY => [
                'contract_id',
                'shipping_address_id',
                'pickup_address_id',
                'consignee_id',
                'consignee_code',
                'consignee_branch',
                'column_7',]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'user_id' => 'User ID',
            'delivery_type' => 'Delivery Type',
            'contract_id' => 'Contract ID',
            'pickup_address_id' => 'Pickup Address ID',
            'shipping_address_id' => 'Shipment Point ID',
            'consignee_fullname' => 'Consignee Fullname',
            'consignee_phone' => 'Consignee Phone',
            'final_recipient_id' => 'Final Recipient ID',
            'driver_info' => 'Driver Info',
            'driver_car_number' => 'Driver Car Number',
            'driver_car_trailer_number' => 'Driver Car Trailer Number',
            'unload_address' => 'Unload Address',
            'consignee_id' => 'Consignee ID',
            'consignee_code' => 'Consignee Code',
            'consignee_branch' => 'Consignee Branch',
            'column_7' => 'Columnt 7',
            'invoice_needed' => 'Invoice Needed',
        ];
    }

    /**
     * Gets query for [[Consignee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConsignee()
    {
        return $this->hasOne(Consignee::class, ['id' => 'consignee_id']);
    }

    /**
     * Gets query for [[Contract]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContract()
    {
        return $this->hasOne(Contract::class, ['id' => 'contract_id']);
    }

    /**
     * Gets query for [[FinalRecipient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFinalRecipient()
    {
        return $this->hasOne(FinalRecipient::class, ['id' => 'final_recipient_id']);
    }

//    /**
//     * Gets query for [[OrderItems]].
//     *
//     * @return \yii\db\ActiveQuery
//     */
//    public function getOrderItems()
//    {
//        return $this->hasMany(OrderItems::class, ['order_id' => 'id']);
//    }
    public function getModelData(): array
    {
        $data = parent::getModelData();

        return $data;
    }

    /**
     * Gets query for [[PickupAddress]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPickupAddress()
    {
        return $this->hasOne(PickupAddress::class, ['id' => 'pickup_address_id']);
    }

    /**
     * Gets query for [[ShipmentPoint]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShipmentPoint()
    {
        return $this->hasOne(ShippingAddress::class, ['id' => 'shipping_address_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
