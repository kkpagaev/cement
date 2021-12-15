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
 * @property int $number
 * @property string $data
 * @property string $filepath
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
            [['status', 'user_id', 'number'], 'integer'],
            [['user_id', 'number', 'data', 'filepath'], 'required'],
            [['data'], 'safe'],
            [['filepath'], 'string', 'max' => 255],
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
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
