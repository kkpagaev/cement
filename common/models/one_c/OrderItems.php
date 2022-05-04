<?php

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;
use Yii;

/**
 * This is the model class for table "order_items".
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $weight
 * @property string|null $order_date
 * @property string|null $order_time
 * @property int|null $wagon_type_id
 *
 * @property Order $order
 * @property Product $product
 * @property WagonType $wagonType
 */
class OrderItems extends Bridgeable1CActiveRecord
{
    const SCENARIO_AUTO = 0;
    const SCENARIO_SELF_PICKUP = 1;
    const SCENARIO_RAILWAY = 2;

    public function scenarios()
    {
        return [
            self::SCENARIO_SELF_PICKUP => [
                'product_id',
                'weight',
                'order_date',
            ],
            self::SCENARIO_AUTO => [
                'product_id',
                'weight',
                'order_date',
                'order_time',
            ],
            self::SCENARIO_RAILWAY => [
                'product_id',
                'weight',
                'wagon_type_id',
            ],
        ];
    }

    function getModelType(): int
    {
        return 11;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'weight'], 'required'],
            [['order_id', 'product_id', 'wagon_type_id'], 'string'],
            [['weight'], 'integer'],
            [['order_date', 'order_time'], 'safe'],
            [[
                'product_id',
                'weight',
                'wagon_type_id',], 'required', 'on' => self::SCENARIO_RAILWAY],
            [[
                'product_id',
                'weight',
                'order_date',
            ], 'required', 'on' => self::SCENARIO_SELF_PICKUP],
            [[
                'product_id',
                'weight',
                'order_date',
                'order_time',
            ], 'required', 'on' => self::SCENARIO_AUTO],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'weight' => 'Weight',
            'order_date' => 'Order Date',
            'order_time' => 'Order Time',
            'wagon_type_id' => 'Wagon Type ID',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    /**
     * Gets query for [[WagonType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWagonType()
    {
        return $this->hasOne(WagonType::class, ['id' => 'wagon_type_id']);
    }
}
