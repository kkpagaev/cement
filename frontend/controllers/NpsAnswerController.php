<?php

namespace frontend\controllers;

use common\models\NpsAnswer;
use Yii;
use yii\web\Controller;

class NpsAnswerController extends Controller
{
    public function actionCreate()
    {
        $model = NpsAnswer::find()->where(['user_id' => Yii::$app->user->id])->one();
        if ($model != null) {
            return $this->redirect(['/']);
        }
        $model = new NpsAnswer();
        $model->user_id = Yii::$app->user->id;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->validate()) {
            if ($model->save()) {
                return $this->redirect(['/']);
            }
        } else {
            $model->loadDefaultValues();
        }
        if (\Yii::$app->request->get('lang') == 'ru') {
            $i18n = include '../i18n/ru/nps.php';
        } else {
            $i18n = include '../i18n/uk/nps.php';

        }
        return $this->render('create', [
            'model' => $model,
            'i18n' => $i18n
        ]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
