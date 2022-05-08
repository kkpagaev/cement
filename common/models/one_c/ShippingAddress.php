<?php

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;
use Yii;

/**
 * This is the model class for table "shipping_address".
 *
 * @property int $id
 * @property int|null $delivery_type
 * @property string|null $address_auto
 * @property string $contract_id
 * @property int|null $address_station_id
 *
 * @property Station $addressStation
 * @property Order[] $orders
 * @property User $user
 */
class ShippingAddress extends Bridgeable1CActiveRecord
{
    const DELIVERY_TYPE_AUTO = 0;
    const DELIVERY_TYPE_RAILWAY = 1;
    function getModelType(): int
    {
        return 6;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shipping_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['delivery_type', 'address_station_id'], 'integer'],
            [['address_auto'], 'string', 'max' => 255],
            [['address_station_id'], 'string'],
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
            'delivery_type' => 'Delivery Type',
            'address_auto' => 'Address Auto',
            'address_station_id' => 'Address Station ID',
            'contract_id' => 'Contract ID',
        ];
    }

    /**
     * Gets query for [[AddressStation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddressStation()
    {
        return $this->hasOne(Station::className(), ['c1_id' => 'address_station_id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['shipment_point_id' => 'id']);
    }

}
