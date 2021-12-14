<?php

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;
use Yii;

/**
 * This is the model class for table "consignee".
 *
 * @property int $id
 * @property string $fullname
 *
 * @property Order[] $orders
 */
class Consignee extends Bridgeable1CActiveRecord
{
    function getModelType(): int
    {
        return 13;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consignee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname'], 'required'],
            [['fullname'], 'string', 'max' => 255],
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
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['consignee_id' => 'id']);
    }
}
