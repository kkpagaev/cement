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
 * @property int|null $shipment_point_id
 * @property string|null $consignee_fullname
 * @property int|null $consignee_phone
 * @property int|null $final_recipient_id
 * @property string|null $driver_info
 * @property string|null $driver_car_number
 * @property string|null $driver_car_trailer_number
 * @property string|null $unload_address
 * @property int|null $consignee_id
 * @property string|null $consignee_edrpou
 * @property string|null $consignee_address
 * @property string|null $consignee_code
 * @property string|null $destination_station
 * @property string|null $consignee_branch
 * @property string|null $columnt_7
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
            [['status', 'user_id', 'delivery_type', 'contract_id', 'invoice_needed'], 'required'],
            [['status', 'user_id', 'delivery_type', 'contract_id', 'pickup_address_id', 'shipment_point_id', 'consignee_phone', 'final_recipient_id', 'consignee_id', 'invoice_needed'], 'integer'],
            [['consignee_fullname'], 'string', 'max' => 255],
            [['driver_info', 'consignee_address', 'destination_station', 'consignee_branch', 'columnt_7'], 'string', 'max' => 1000],
            [['driver_car_number', 'driver_car_trailer_number'], 'string', 'max' => 8],
            [['unload_address'], 'string', 'max' => 500],
            [['consignee_edrpou'], 'string', 'max' => 12],
            [['consignee_code'], 'string', 'max' => 5],
            [['consignee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Consignee::class, 'targetAttribute' => ['consignee_id' => 'id']],
            [['contract_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contract::class, 'targetAttribute' => ['contract_id' => 'id']],
            [['final_recipient_id'], 'exist', 'skipOnError' => true, 'targetClass' => FinalRecipient::class, 'targetAttribute' => ['final_recipient_id' => 'id']],
            [['pickup_address_id'], 'exist', 'skipOnError' => true, 'targetClass' => PickupAddress::class, 'targetAttribute' => ['pickup_address_id' => 'id']],
            [['shipment_point_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShippingAddress::class, 'targetAttribute' => ['shipment_point_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'shipment_point_id' => 'Shipment Point ID',
            'consignee_fullname' => 'Consignee Fullname',
            'consignee_phone' => 'Consignee Phone',
            'final_recipient_id' => 'Final Recipient ID',
            'driver_info' => 'Driver Info',
            'driver_car_number' => 'Driver Car Number',
            'driver_car_trailer_number' => 'Driver Car Trailer Number',
            'unload_address' => 'Unload Address',
            'consignee_id' => 'Consignee ID',
            'consignee_edrpou' => 'Consignee Edrpou',
            'consignee_address' => 'Consignee Address',
            'consignee_code' => 'Consignee Code',
            'destination_station' => 'Destination Station',
            'consignee_branch' => 'Consignee Branch',
            'columnt_7' => 'Columnt 7',
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

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::class, ['order_id' => 'id']);
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
        return $this->hasOne(ShippingAddress::class, ['id' => 'shipment_point_id']);
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
