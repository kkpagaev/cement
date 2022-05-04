<?php

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;
use Yii;

/**
 * This is the model class for table "report".
 *
 * @property int $id
 * @property int|null $status
 * @property int $user_id
 * @property string $filepath
 *
 * @property User $user
 */
class Report extends Bridgeable1CActiveRecord
{
    function getModelType(): int
    {
        return 1;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['user_id'], 'string'],
            [['c1_id'], 'string'],

            [['user_id'], 'required'],
            [['filepath'], 'string', 'max' => 255],
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
