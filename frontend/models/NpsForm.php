<?php

namespace frontend\models;

use yii\base\Model;

class NpsForm extends Model
{
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }
}