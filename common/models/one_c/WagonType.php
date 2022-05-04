<?php

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;
use Yii;

/**
 * This is the model class for table "wagon_type".
 *
 * @property int $id
 * @property string $title
 *
 * @property OrderItems[] $orderItems
 */
class WagonType extends Bridgeable1CActiveRecord
{
    function getModelType(): int
    {
        return 9;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wagon_type';
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
        ];
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::class, ['wagon_type_id' => 'id']);
    }
}
