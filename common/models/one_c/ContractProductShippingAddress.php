<?php 

namespace common\models\one_c;

class ContractProductShippingAddress extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'contract_product_shipping_address';
    }
    
    public function rules()
    {
        return [
            [['contract_id', 'product_id', 'shipping_address_id', 'c1_id'], 'required'],
            [['contract_id', 'product_id', 'shipping_address_id', 'c1_id'], 'string', 'max' => 255],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contract_id' => 'Contract ID',
            'product_id' => 'Product ID',
            'shipping_address_id' => 'Shipping Address ID',
        ];
    }
}