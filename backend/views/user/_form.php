<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\one_c\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->input('email') ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'is_banned')->checkbox(['value' => '1']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
