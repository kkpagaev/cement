<?php

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;
use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 *
 * @property OrderItems[] $orderItems
 */
class Product extends Bridgeable1CActiveRecord
{
    function getModelType(): int
    {
        return 8;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['c1_id'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'c1_id' => '1c id',
        ];
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::class, ['product_id' => 'id']);
    }

    public static function getPlaceOrderProducts($contract_id = null, $pickup_id = null)
    {
        if ($contract_id == null) {
            return [];
        }
        $sql = "SELECT * FROM `product` WHERE `c1_id` IN (
                SELECT `product_id` FROM `product_pickup_address` 
                WHERE `product_id` IN (SELECT `product_id` FROM `contract_product` WHERE `contract_id` = :cont_id)
                AND `pickup_address_id` = :pickup_id); 
            );
        ";
        $products = Product::findBySql($sql, [
            ':cont_id' => $contract_id,
            ':pickup_id' => $pickup_id
        ])->all();
        return $products;
    }
}
