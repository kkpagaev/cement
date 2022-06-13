<?php

namespace common\models\one_c;

use Carbon\Carbon;
use common\services\one_c\models\Bridgeable1CActiveRecord;
use Yii;

/**
 * This is the model class for table "act".
 *
 * @property int $id
 * @property int $user_id
 * @property int $contract_id
 * @property int $number
 * @property string $date_from
 * @property string $date_to
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
    // const SCENARIO_1C_REQUEST = "1c";


    // public function scenarios()
    // {

    //     return array_merge(parent::scenarios(), [
    //         self::SCENARIO_1C_REQUEST => [
    //             'user_id',
    //             'contract_id',
    //             'date_from',
    //             'date_to',
    //         ],
    //     ]);
    // }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'contract_id', 'date_from', 'date_to'], 'required'],
            [['number'], 'string'],
            [['date_from'], 'date', 'format' => 'php:Y-m-d'],
            [['date_to'], 'date', 'format' => 'php:Y-m-d'],
            [['filepath', 'user_id', 'contract_id',], 'string', 'max' => 255],
            ['date_to', 'validateDates'],
        ];
    }

    public function validateDates()
    {
        if (!Carbon::create($this->date_from)->lessThan(Carbon::create($this->date_to))) {
            $this->addError('date_from', 'Дата від має бути меншою за Дату до');
        }
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
            'date_from' => 'Date From',
            'date_to' => 'Date To',
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
