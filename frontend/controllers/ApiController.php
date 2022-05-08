<?php

namespace frontend\controllers;

use common\models\one_c\Notification;
use common\services\one_c\models\Export;

class ApiController extends \yii\web\Controller
{
    public function actionReadNotification()
    {

        $user_id = $this->request->get('user_id');
        $notification_id = $this->request->get('notification_id');
        $not = Notification::find()->where(['user_id' => $user_id, 'c1_id' =>$notification_id])->one();
        $not->is_read = 1;
        $exp = new Export();
        $export = Export::export($not, $user_id, Export::ACTION_UPDATE);
        $export->save();
        $not->save();
        return $this->asJson([]);
    }

}
