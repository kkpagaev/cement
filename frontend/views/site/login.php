<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Авторизуватися';
$this->params['breadcrumbs'][] = $this->title;
?>


<!--  -->

<div class="authentication">

    <!-- Container start -->
    <div class="container">

            <div class="row justify-content-md-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-screen">
                        <div class="login-box">

                            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                            <div class="logo">
                                <a href="#" class="login-logo">
                                    <img src="img/Ресурс 1@3x.png" alt="" />
                                </a>

                                <a href="index.html"><img src="/img/logo2.png" alt="Logo"></a>
                            </div>
                            <h5>Вітаємо!<br />Будьласка, введіть ваші дані авторизації. Або <a href="/site/password" class=" p-0 m-0" style="color: blue">отримайте пароль</a></h5>
    
                            <?= $form->field($model, 'email')->label("Пошта")->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'password')->label("Пароль")->passwordInput() ?>
                            <div class="actions mb-4">
                                <div class="custom-control custom-checkbox">
                                    <?= $form->field($model, 'rememberMe')->checkbox()->label("Запам'ятати мене")  ?>
                                </div>

                                <div class="form-group">
                                    <?= Html::submitButton('Увійти', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                                </div>

                            </div>


                            <?php ActiveForm::end(); ?>
                           
                            <hr>


                        </div>
                    </div>
                </div>
            </div>

    </div>
    <!-- Container end -->

</div>