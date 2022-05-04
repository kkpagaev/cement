<?php

namespace common\models;

use common\models\one_c\Product;
use common\services\one_c\models\Export;
use Yii;
use yii\db\Exception;

/**
 * This is the model class for table "import".
 *
 * @property int $id
 * @property string $user_id
 * @property int $model_type
 * @property int|null $model_id
 * @property int $action
 * @property string|null $data
 */
class Import extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'import';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'model_type', 'action'], 'required'],
            [['model_type', 'model_id', 'action'], 'integer'],
            [['data'], 'string'],
            [['user_id'], 'string', 'max' => 255],
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
            'model_type' => 'Model Type',
            'model_id' => 'Model ID',
            'action' => 'Action',
            'data' => 'Data',
        ];
    }

    public function process()
    {
        if($this->action == Export::ACTION_CREATE) {
            return $this->processCreate();
        } else if($this->action == Export::ACTION_UPDATE) {
            return $this->processUpdate();
        } else if($this->action == Export::ACTION_DELETE) {
            return $this->processDelete();
        }
        return null;
    }

    private function processCreate()
    {
        $modelClass = Export::dataTypes[$this->model_type];
        $model = new $modelClass;
        $model->attributes = ($this->getData());
        try {
            $model->save();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        if($model->hasErrors()) {
            return $model->getErrors();
        }
        return null;
    }

    public function getData(): array
    {
        $data = json_decode(($this->data), true);
        $data['c1_id'] = $this->model_id;
        return $data;
    }

    private function processUpdate()
    {
        $modelClass = Export::dataTypes[$this->model_type];
        $model = (new $modelClass)::find()->where(['c1_id' => $this->model_id])->one();
        if($model == null) return null;
        foreach ($this->getData() as $key => $value) {
            $model->{$key} = $value;
        }
        $model->save();
        if($model->hasErrors()) {
            return $model->getErrors();
        }
        return null;
    }

    private function processDelete()
    {
        $modelClass = Export::dataTypes[$this->model_type];
        // retrieves model
        $model = (new $modelClass)::find()->where(['id' => $this->model_id])->one();

        $model->delete();
        if($model->hasErrors()) {
            return $model->getErrors();
        }
        return null;
    }
}
