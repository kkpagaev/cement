<?php

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;
use Yii;

/**
 * This is the model class for table "act".
 *
 * @property int $id
 * @property int $user_id
 * @property int $contract_id
 * @property int $number
 * @property string $data_from
 * @property string $data_to
 * @property string $filepath
 *
 * @property Contract $contract
 * @property User $user
 */
class Act extends Bridgeable1CActiveRecord
{
    function getModelType(): int
    {
        return 3;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'act';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'contract_id', 'number', 'data_from', 'data_to'], 'required'],
            [['user_id', 'contract_id', 'number'], 'integer'],
            [['data_from', 'data_to'], 'safe'],
            [['filepath'], 'string', 'max' => 255],
            [['contract_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contract::class, 'targetAttribute' => ['contract_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'contract_id' => 'Contract ID',
            'number' => 'Number',
            'data_from' => 'Data From',
            'data_to' => 'Data To',
            'filepath' => 'Filepath',
        ];
    }

    /**
     * Gets query for [[Contract]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContract()
    {
        return $this->hasOne(Contract::class, ['id' => 'contract_id']);
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
