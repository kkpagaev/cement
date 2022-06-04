<?php

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;
use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property int $id
 * @property int|null $status
 * @property int $user_id
 * @property string|null $number
 * @property string $order_id
 * @property string $data
 * @property string|null $filepath
 *
 * @property User $user
 */
class Invoice extends Bridgeable1CActiveRecord
{
    function getModelType(): int
    {
        return 2;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['user_id', 'data'], 'required'],
            [['data'], 'safe'],

            [['number', 'user_id', 'filepath', 'product_id', 'order_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'user_id' => 'User ID',
            'number' => 'Number',
            'data' => 'Data',
            'filepath' => 'Filepath',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['c1_id' => 'product_id']);
    }
}
