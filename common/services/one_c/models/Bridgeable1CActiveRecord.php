<?php

namespace common\services\one_c\models;

use common\services\one_c\Bridgeable1C;
use yii\db\ActiveRecord;

abstract class Bridgeable1CActiveRecord extends ActiveRecord implements Bridgeable1C
{
    // Exclude attributes in the get model date method
    public $excludeExportAttributes = [];

    function getModelId()
    {
        return $this->getAttribute('id');
    }

    function getModelData(): array
    {
        $data = $this->attributes;
        if(key_exists('id', $data)) {
            unset($data['id']);
        }
        foreach ($this->excludeExportAttributes as $attribute) {
            unset($attribute);
        }
        return $data;
    }
}