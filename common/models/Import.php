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
        if ($this->action == Export::ACTION_CREATE) {
            return $this->processCreate();
        } else if ($this->action == Export::ACTION_UPDATE) {
            return $this->processUpdate();
        } else if ($this->action == Export::ACTION_DELETE) {
            return $this->processDelete();
        }
        return null;
    }

    private function processCreate()
    {
        $model = $this->getModel();
        $data = $this->getData();
        if(isset($data['data_file'])) {
            $file = base64_decode( $data['data_file']);

            //the used alias in path is only example.
            //The datetime and random string are used to avoid conflicts
            $filename =  date('Y-m-d-H-i-s') .
            Yii::$app->security->generateRandomString(64) . '.pdf';
            $filenamePath = Yii::getAlias(
                '@frontend/web/uploads/' . $filename
            );

            if (!file_put_contents($filenamePath, $file)) {
                throw new \yii\base\Exception("Couldn't save file to $filenamePath");
            }
            $data['filepath'] = $filename;
            unset($file);
            unset($data['data_file']);
        }


        $model->attributes = ($data);
        try {
            $model->save();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        if ($model->hasErrors()) {
            return $model->getErrors();
        }

        return null;
    }

    public function getData(): array
    {
        $data = json_decode(($this->data), true);
        if ($this->has1cId()) {
            $data['c1_id'] = $this->model_id;
        } else {
            $data['id'] = $this->model_id;
        }
        return $data;
    }

    private function getModelClass()
    {
        return Export::dataTypes[$this->model_type];
    }
    private function getModel() {
        $class = ($this->getModelClass());
        return new $class;
    }

    private function findModel() {
        $modelClass = $this->getModelClass();
        if ($this->has1cId()) {
            $model = (new $modelClass)::find()->where(['c1_id' => $this->model_id])->one();
        } else {
            $model = (new $modelClass)::find()->where(['id' => $this->model_id])->one();
        }
        return $model;
    }

    private function has1cId()
    {
        return ($this->getModel())
            ->hasAttribute('c1_id');
    }

    private function processUpdate()
    {
        $model = $this->findModel();
        if ($model == null) return null;
        $data = $this->getData();
        if(isset($data['data_file'])) {
            $file = base64_decode( $data['data_file']);

            //the used alias in path is only example.
            //The datetime and random string are used to avoid conflicts
            $filename =  date('Y-m-d-H-i-s') .
                Yii::$app->security->generateRandomString(64) . '.pdf';
            $filenamePath = Yii::getAlias(
                '@frontend/web/uploads/' . $filename
            );

            if (!file_put_contents($filenamePath, $file)) {
                throw new \yii\base\Exception("Couldn't save file to $filenamePath");
            }
            $data['filepath'] = $filename;
            unset($file);
            unset($data['data_file']);
        }


        foreach ($data as $key => $value) {
            $model->{$key} = $value;
        }
        $model->save();
        if ($model->hasErrors()) {
            return $model->getErrors();
        }
        return null;
    }

    private function processDelete()
    {
        $model = $this->findModel();
        $model->delete();
        if ($model->hasErrors()) {
            return $model->getErrors();
        }
        return null;
    }
}
