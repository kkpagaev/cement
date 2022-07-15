<?php

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;
use Yii;

/**
 * This is the model class for table "contract".
 *
 * @property int $id
 * @property int $user_id
 * @property string $date_from
 * @property string $number
 * @property string $c1_id
 *
 * @property Act[] $acts
 * @property Order[] $orders
 * @property User $user
 */
class Contract extends Bridgeable1CActiveRecord
{
    function getModelType(): int
    {
        return 5;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contract';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'date_from', 'number'], 'required'],
            [['user_id'], 'string'],
            [['c1_id'], 'string'],
            [['date_from'], 'safe'],
            [['expired_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'user_id' => 'User ID',
            'date_from' => 'Data From',
        ];
    }

    /**
     * Gets query for [[Acts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActs()
    {
        return $this->hasMany(Act::class, ['contract_id' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['contract_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
