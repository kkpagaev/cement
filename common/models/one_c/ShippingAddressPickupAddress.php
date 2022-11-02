<?php

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;

class ShippingAddressPickupAddress extends Bridgeable1CActiveRecord
{
    function getModelType(): int
    {
        return 18;
    }

    public function rules()
    {
        return [
            [['c1_id'], 'string'],
            [['shipping_address_id'], 'string'],
            [['pickup_address_id'], 'string'],
        ];
    }

    public static function tableName()
    {
        return '{{%shipping_address_pickup_address}}';
    }

    public function getShippingAddress()
    {
        return $this->hasOne(ShippingAddress::class, ['id' => 'shipping_address_id']);
    }

    public function getPickupAddress()
    {
        return $this->hasOne(PickupAddress::class, ['id' => 'pickup_address_id']);
    }
}
