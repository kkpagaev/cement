<?php

namespace frontend\models;

use common\models\one_c\User;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class PasswordForm extends Model
{
    public $email;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'required'],

            ['email', 'email'],
            ['email', 'userEmailExists'],

        ];
    }

    public function userEmailExists()
    {
        $user = User::findOne(['email' => $this->email]);
        if (!$user) {
            $this->addError('email', 'Такої пошти не існує');
            return;
        }
        if($user->password != "") {
            $this->addError('email', 'Пароль для цієї пошти вже інує');
            return;
        }

    }

    public function post()
    {
        if (!$this->validate()) {
            return false;
        }
        $user = User::find()->where(['email' => $this->email])->one();
        $password = Yii::$app->security->generateRandomString(12);
        $user->password = $password;
        $user->save();
        return $password;

    }
}
