<?php

namespace common\models\one_c;

use common\models\one_c\Recipient;
use common\services\one_c\models\Bridgeable1CActiveRecord;

class FinalRecipientProduct extends Bridgeable1CActiveRecord
{

    function getModelType(): int
    {
        return 13;
    }

    public static function tableName()
    {
        return 'final_recipient_product';
    }

    public function rules()
    {
        return [
            [['final_recipient_id', 'product_id'], 'required'],
            [['c1_id'], 'string'],
            [['final_recipient_id'], 'string'],
            [['product_id'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'final_recipient_id' => 'Final Recipient ID',
            'product_id' => 'Product ID',
        ];
    }

    public function getFinalRecipient()
    {
        return $this->hasOne(Recipient::class, ['id' => 'final_recipient_id']);
    }

    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}
