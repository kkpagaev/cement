<?php

namespace frontend\controllers;

use common\models\one_c\Invoice;

class InvoiceController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $user_id = \Yii::$app->user->getIdentity()->c1_id;

        return $this->render('index', [
            'invoices' => Invoice::find()->where(['user_id' => $user_id])->all(),
        ]);
    }

}
