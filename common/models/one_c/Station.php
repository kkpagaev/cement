<?php

namespace common\models\one_c;

use Yii;

/**
 * This is the model class for table "station".
 *
 * @property int $id
 * @property string|null $fullname
 *
 * @property ShippingAddress[] $shippingAddresses
 */
class Station extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'station';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname'], 'string', 'max' => 255],
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
            'fullname' => 'Fullname',
        ];
    }

    /**
     * Gets query for [[ShippingAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShippingAddresses()
    {
        return $this->hasMany(ShippingAddress::className(), ['address_station_id' => 'id']);
    }
}
