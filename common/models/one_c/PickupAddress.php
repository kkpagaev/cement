<?php

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;
use Yii;

/**
 * This is the model class for table "pickup_address".
 *
 * @property int $id
 * @property string $address
 *
 * @property Order[] $orders
 */
class PickupAddress extends Bridgeable1CActiveRecord
{
    function getModelType(): int
    {
        return 7;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pickup_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address'], 'required'],
            [['address'], 'string', 'max' => 255],
            [['c1_id'], 'string'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['pickup_address_id' => 'id']);
    }
}
