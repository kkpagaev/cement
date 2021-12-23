<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\NpsAnswer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nps Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nps-answer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'text_1:ntext',
            'text_2:ntext',
            'question_1',
            'question_2',
            'question_3',
            'question_4',
            'question_5',
            'question_6',
            'question_7',
            'question_8',
            'question_9',
            'question_10',
            'question_11',
            'question_12',
            'question_13',
            'question_14',
            'question_15',
            'question_16',
            'question_17',
            'question_18',
            'question_19',
            'question_20',
            'question_21',
            'question_22',
            'question_23',
            'question_24',
            'question_25',
            'question_26',
            'question_27',
            'question_28',
            'question_29',
            'question_30',
            'created_at',
        ],
    ]) ?>

</div>
