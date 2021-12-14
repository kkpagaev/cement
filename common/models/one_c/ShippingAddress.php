<?php

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;
use Yii;

/**
 * This is the model class for table "shipping_address".
 *
 * @property int $id
 * @property int $user_id
 * @property string $city
 * @property string $address
 *
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
            [['user_id', 'city', 'address'], 'required'],
            [['user_id'], 'integer'],
            [['city', 'address'], 'string', 'max' => 255],
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
            'user_id' => 'User ID',
            'city' => 'City',
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
        return $this->hasMany(Order::class, ['shipment_point_id' => 'id']);
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
