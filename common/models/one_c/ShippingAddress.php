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
 * @property int|null $address_station_id
 *
 * @property Station $addressStation
 * @property Order[] $orders
 * @property User $user
 */
class ShippingAddress extends Bridgeable1CActiveRecord
{
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
            [['address_station_id'], 'exist', 'skipOnError' => true, 'targetClass' => Station::className(), 'targetAttribute' => ['address_station_id' => 'id']],
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
        ];
    }

    /**
     * Gets query for [[AddressStation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddressStation()
    {
        return $this->hasOne(Station::className(), ['id' => 'address_station_id']);
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
