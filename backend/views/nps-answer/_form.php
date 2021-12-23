<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NpsAnswer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nps-answer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text_1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'text_2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'question_1')->textInput() ?>

    <?= $form->field($model, 'question_2')->textInput() ?>

    <?= $form->field($model, 'question_3')->textInput() ?>

    <?= $form->field($model, 'question_4')->textInput() ?>

    <?= $form->field($model, 'question_5')->textInput() ?>

    <?= $form->field($model, 'question_6')->textInput() ?>

    <?= $form->field($model, 'question_7')->textInput() ?>

    <?= $form->field($model, 'question_8')->textInput() ?>

    <?= $form->field($model, 'question_9')->textInput() ?>

    <?= $form->field($model, 'question_10')->textInput() ?>

    <?= $form->field($model, 'question_11')->textInput() ?>

    <?= $form->field($model, 'question_12')->textInput() ?>

    <?= $form->field($model, 'question_13')->textInput() ?>

    <?= $form->field($model, 'question_14')->textInput() ?>

    <?= $form->field($model, 'question_15')->textInput() ?>

    <?= $form->field($model, 'question_16')->textInput() ?>

    <?= $form->field($model, 'question_17')->textInput() ?>

    <?= $form->field($model, 'question_18')->textInput() ?>

    <?= $form->field($model, 'question_19')->textInput() ?>

    <?= $form->field($model, 'question_20')->textInput() ?>

    <?= $form->field($model, 'question_21')->textInput() ?>

    <?= $form->field($model, 'question_22')->textInput() ?>

    <?= $form->field($model, 'question_23')->textInput() ?>

    <?= $form->field($model, 'question_24')->textInput() ?>

    <?= $form->field($model, 'question_25')->textInput() ?>

    <?= $form->field($model, 'question_26')->textInput() ?>

    <?= $form->field($model, 'question_27')->textInput() ?>

    <?= $form->field($model, 'question_28')->textInput() ?>

    <?= $form->field($model, 'question_29')->textInput() ?>

    <?= $form->field($model, 'question_30')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
