<?php

namespace common\models\forms;

use common\models\News;
use yii\base\Model;
use yii\db\Expression;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload(string $dir): string
    {
        $imageName = md5(rand()) . '.' . $this->imageFile->extension;
        $path = '/uploads/' . $dir . '/' . $imageName;
        $this->imageFile->saveAs(\Yii::getAlias('@webroot') . $path);
        return $path;
    }
}