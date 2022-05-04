<?php

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;
use Yii;

/**
 * This is the model class for table "notification".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $is_read
 * @property string $title
 * @property string $description
 * @property string $timestamp
 *
 * @property User $user
 */
class Notification extends Bridgeable1CActiveRecord
{
    function getModelType(): int
    {
        return 4;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'timestamp'], 'required'],
            [['is_read'], 'integer'],
            [['timestamp'], 'safe'],
            [['c1_id'], 'string'],
            [['user_id'], 'string'],

            [['title', 'description', 'user_id'], 'string', 'max' => 255],
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
            'is_read' => 'Is Read',
            'title' => 'Title',
            'description' => 'Description',
            'timestamp' => 'Timestamp',
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
