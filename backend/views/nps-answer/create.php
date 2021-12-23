<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NpsAnswer */

$this->title = 'Create Nps Answer';
$this->params['breadcrumbs'][] = ['label' => 'Nps Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nps-answer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
