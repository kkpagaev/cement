<?php 

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;

class ProductPickupAddress extends Bridgeable1CActiveRecord
{
    function getModelType(): int
    {
        return 16;
    }
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_pickup_address';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c1_id', 'product_id', 'pickup_address_id'], 'required'],
        ];
    }
} 