<?php

namespace backend\controllers;

use common\models\Import;
use common\models\one_c\Product;
use common\services\one_c\models\Export;
use Yii;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;

class ApiController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => \yii\filters\VerbFilter::class,
                'actions' => [
                    'import' => ['POST'],
                    'export' => ['GET'],
                ],
            ],
        ];
    }

    public function actionImport()
    {
        $request = Yii::$app->request;
        $data = json_decode(($request->getRawBody()), true);
        if(!$data || $data == []) {
            throw new BadRequestHttpException;
        }
        $errors = [];
        foreach ($data as $modelJson) {
            $import = new Import();
            $import->attributes = $modelJson;
            $import->data = json_encode($modelJson['data']);
            $import->save();
            if($error = $import->process()) {
                $errors[] = [
                    'entity' => $modelJson,
                    'message' => $error
                ];
            }
        }
        return $this->asJson($errors);
    }

    public function actionExport(): \yii\web\Response
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $exports = array_map(function ($export) {
            $export = $export->toArray();
            $export['data'] = json_decode($export['data']);
            return $export;
        }, Export::find()->where(['>=', 'id', $id])->all());

        return $this->asJson($exports);
    }


}
