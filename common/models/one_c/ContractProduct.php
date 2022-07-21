<?php 

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;

class ContractProduct extends Bridgeable1CActiveRecord
{
    function getModelType(): int
    {
        return 17;
    }
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contract_product';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c1_id', 'product_id', 'contract_id'], 'required'],
        ];
    }
}