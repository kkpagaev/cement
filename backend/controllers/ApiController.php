<?php

namespace backend\controllers;

use common\models\Import;
use common\models\one_c\Product;
use common\services\one_c\models\Export;
use Yii;
use yii\helpers\VarDumper;

class ApiController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => \yii\filters\VerbFilter::class,
                'actions' => [
                    'create' => ['POST'],
                ],
            ],
        ];
    }

    public function actionImport()
    {
        $request = Yii::$app->request;
        $data = json_decode(($request->post('data')), true);

        foreach ($data as $modelJson) {
            $import = new Import();
            $import->attributes = $modelJson;
            $import->save();
            $import->process();
        }
    }

    public function actionExport(): \yii\web\Response
    {
        $request = Yii::$app->request;
        $id = $request->get('id');

        return $this->asJson(Export::find()->where(['>=', 'id', $id])->all());
    }


}
