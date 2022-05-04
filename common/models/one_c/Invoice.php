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
            [['c1_id'], 'string'],

            [['number', 'user_id', 'filepath'], 'string', 'max' => 255],
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
}
