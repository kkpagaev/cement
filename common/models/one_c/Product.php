<?php

namespace common\models\one_c;

use common\models\forms\OrderForm;
use common\services\one_c\models\Bridgeable1CActiveRecord;
use GuzzleHttp\Psr7\Query;
use Yii;
use yii\db\Query as DbQuery;

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

    public static function getPlaceOrderProducts($contract_id = null, $pickup_id = null, $final_recipient_id = null, $scenario = null)
    {

        if ($scenario == OrderForm::SCENARIO_RAILWAY) {
            $sql = "SELECT *,  `product`.`c1_id` AS `c1_id` FROM `product` 
            JOIN `final_recipient_product` ON `final_recipient_product`.`product_id` = `product`.`c1_id`
            JOIN `product_pickup_address` ON `product_pickup_address`.`product_id` = `product`.`c1_id`
            JOIN `contract_product` on `contract_product`.`product_id` = `product`.`c1_id`
            WHERE `final_recipient_product`.`final_recipient_id` = :final_recipient_id
            AND `product_pickup_address`.`pickup_address_id` = :pickup_id
            AND `contract_product`.`contract_id` = :cont_id;";

            return Product::findBySql($sql, [
                ':final_recipient_id' => $final_recipient_id,
                ':cont_id' => $contract_id,
                ':pickup_id' => $pickup_id,
            ])->all();
        } else if ($contract_id == null) {
            return [];
        } else {
            $sql = "SELECT * FROM `product` WHERE `c1_id` IN (
                SELECT `product_id` FROM `product_pickup_address` 
                WHERE `product_id` IN (SELECT `product_id` FROM `contract_product` WHERE `contract_id` = :cont_id)
                AND `pickup_address_id` = :pickup_id); 
            );
            ";
            return Product::findBySql($sql, [
                ':cont_id' => $contract_id,
                ':pickup_id' => $pickup_id,
            ])->all();
        }
    }
}
