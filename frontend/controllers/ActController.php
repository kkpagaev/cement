<?php

namespace frontend\controllers;

use common\models\one_c\Act;
use common\models\one_c\Contract;
use common\services\one_c\models\Export;
use Yii;

class ActController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $user_id = \Yii::$app->user->getIdentity()->c1_id;

        $model = new Act();
        // $model->scenario = Act::SCENARIO_1C_REQUEST;
        $model->user_id = $user_id;
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $export = Export::export($model, $user_id, Export::ACTION_CREATE);
                $export->save();
                $model = new Act();

                Yii::$app->session->setFlash('success', "Запит на створення акту звірки подано");
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('index', ["acts" => Act::find()->where(["user_id" => $user_id])->all(), "model" => $model, "contracts" => $this->getContracts($user_id)]);
    }


    private function getContracts($user_id)
    {
        $contracts = Contract::find()->where(['user_id' => $user_id])->all();
        $result = [];
        foreach ($contracts as $contract) {
            $result[$contract->c1_id] = "Договір №" . $contract->number . " від " . $contract->date_from;
        }
        return $result;
    }
}
