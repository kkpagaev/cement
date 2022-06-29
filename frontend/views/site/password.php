<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Отримати пароль';
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if($password != ""): ?>
        <div class="row">
        Ваш пароль: <?= $password?>
        </div>
    <?php else: ?>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'email')->label("Пошта")->textInput(['autofocus' => true]) ?>


            <div class="form-group">
                <?= Html::submitButton('Увійти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <?php endif; ?>

</div>
