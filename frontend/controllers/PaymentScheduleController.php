<?php 

namespace frontend\controllers;

use common\models\one_c\PaymentSchedule;
use yii\web\Controller;

class PaymentScheduleController extends Controller
{
    public function actionIndex()
    {
        $user_id = \Yii::$app->user->getIdentity()->c1_id;

        $payments = PaymentSchedule::find()->where(["user_id" => $user_id])->all();
        return $this->render('index', [
            'payments' => $payments,
        ]);
    }
}