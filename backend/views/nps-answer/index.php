<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nps Answers';
$this->params['breadcrumbs'][] = $this->title;

function getPercentage($numerator, $denominator): float
{
    if($denominator == 0) {
        return 0.00;
    }
    return round($numerator / $denominator * 100, 2);
}

?>
<div class="nps-answer-index">
    <h1>Статистика NPS</h1>
    <form action="/nps-answer">
        <label for="date-1">Дата від:</label>
        <input type="date" name="date-1" id="date-1" value="<?= $date1 ?>">
        <label for="date-2">Дата до:</label>
        <input type="date" name="date-2" id="date-2" value="<?= $date2 ?>">
        <button class="btn btn-primary">пошук</button>
    </form>
    <h2>
        Логістика
    </h2>
    <div id="w0" class="">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Контактні обличчя</th>
                <th>Проміжок</th>
                <th>Низькі бали(0-6)</th>
                <th>Середні бали(7-8)</th>
                <th>Високі бали(9-10)</th>
                <th>Base</th>
                <th>Ср. бали(оцінка)</th>
                <th>Corr coeff</th>
            </thead>
            <tbody>
            <?php for ($i = 2; $i <= 8; $i++): ?>
                <tr data-key="1">
                    <td><?= $i18n['question_' . $i] ?></td>
                    <td><?= $date1 ?> - <?= $date2 ?></td>

                    <td><?= $statistic["question_{$i}_low_count"] ?>
                        (<?= getPercentage($statistic["question_{$i}_low_count"], $statistic["question_{$i}_count"]) ?>%)
                    </td>
                    <td><?= $statistic["question_{$i}_avg_count"] ?>
                        (<?= getPercentage($statistic["question_{$i}_low_count"], $statistic["question_{$i}_count"]) ?>%)
                    </td>
                    <td><?= $statistic["question_{$i}_high_count"] ?>
                        (<?= getPercentage($statistic["question_{$i}_low_count"], $statistic["question_{$i}_count"]) ?>%)
                    </td>
                    <td><?= $statistic["question_{$i}_sum"] ?></td>
                    <td><?= $statistic["question_{$i}_avg"] ?></td>
                    <td>0</td>
                </tr>
            <?php endfor; ?>

            </tbody>
        </table>
    </div>
    <h2>
        Взаємовідносини
    </h2>
    <div id="w0" class="">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Контактні обличчя</th>
                <th>Проміжок</th>
                <th>Низькі бали(0-6)</th>
                <th>Середні бали(7-8)</th>
                <th>Високі бали(9-10)</th>
                <th>Base</th>
                <th>Ср. бали(оцінка)</th>
                <th>Corr coeff</th>
            </thead>
            <tbody>
            <?php for ($i = 9; $i <= 18; $i++): ?>
                <tr data-key="1">
                    <td><?= $i18n['question_' . $i] ?></td>
                    <td><?= $date1 ?> - <?= $date2 ?></td>


                    <td><?= $statistic["question_{$i}_low_count"] ?>
                        (<?= getPercentage($statistic["question_{$i}_low_count"], $statistic["question_{$i}_count"]) ?>%)
                    </td>
                    <td><?= $statistic["question_{$i}_avg_count"] ?>
                        (<?= getPercentage($statistic["question_{$i}_low_count"], $statistic["question_{$i}_count"]) ?>%)
                    </td>
                    <td><?= $statistic["question_{$i}_high_count"] ?>
                        (<?= getPercentage($statistic["question_{$i}_low_count"], $statistic["question_{$i}_count"]) ?>%)
                    </td>
                    <td><?= $statistic["question_{$i}_sum"] ?></td>
                    <td><?= $statistic["question_{$i}_avg"] ?></td>
                    <td>0</td>
                </tr>
            <?php endfor; ?>

            </tbody>
        </table>
    </div>
    <h2>
        Продукт
    </h2>
    <div id="w0" class="">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Контактні обличчя</th>
                <th>Проміжок</th>
                <th>Низькі бали(0-6)</th>
                <th>Середні бали(7-8)</th>
                <th>Високі бали(9-10)</th>
                <th>Base</th>
                <th>Ср. бали(оцінка)</th>
                <th>Corr coeff</th>
            </thead>
            <tbody>
            <?php for ($i = 19; $i <= 25; $i++): ?>
                <tr data-key="1">
                    <td><?= $i18n['question_' . $i] ?></td>
                    <td><?= $date1 ?> - <?= $date2 ?></td>


                    <td><?= $statistic["question_{$i}_low_count"] ?>
                        (<?= getPercentage($statistic["question_{$i}_low_count"], $statistic["question_{$i}_count"]) ?>%)
                    </td>
                    <td><?= $statistic["question_{$i}_avg_count"] ?>
                        (<?= getPercentage($statistic["question_{$i}_low_count"], $statistic["question_{$i}_count"]) ?>%)
                    </td>
                    <td><?= $statistic["question_{$i}_high_count"] ?>
                        (<?= getPercentage($statistic["question_{$i}_low_count"], $statistic["question_{$i}_count"]) ?>%)
                    </td>
                    <td><?= $statistic["question_{$i}_sum"] ?></td>
                    <td><?= $statistic["question_{$i}_avg"] ?></td>
                    <td>0</td>
                </tr>
            <?php endfor; ?>

            </tbody>
        </table>
    </div>
    <h2>
        Додана вартість
    </h2>
    <div id="w0" class="">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Контактні обличчя</th>
                <th>Проміжок</th>
                <th>Низькі бали(0-6)</th>
                <th>Середні бали(7-8)</th>
                <th>Високі бали(9-10)</th>
                <th>Base</th>
                <th>Ср. бали(оцінка)</th>
                <th>Corr coeff</th>
            </thead>
            <tbody>
            <?php for ($i = 26; $i <= 30; $i++): ?>
                <tr data-key="1">
                    <td><?= $i18n['question_' . $i] ?></td>
                    <td><?= $date1 ?> - <?= $date2 ?></td>


                    <td><?= $statistic["question_{$i}_low_count"] ?>
                        (<?= getPercentage($statistic["question_{$i}_low_count"], $statistic["question_{$i}_count"]) ?>%)
                    </td>
                    <td><?= $statistic["question_{$i}_avg_count"] ?>
                        (<?= getPercentage($statistic["question_{$i}_low_count"], $statistic["question_{$i}_count"]) ?>%)
                    </td>
                    <td><?= $statistic["question_{$i}_high_count"] ?>
                        (<?= getPercentage($statistic["question_{$i}_low_count"], $statistic["question_{$i}_count"]) ?>%)
                    </td>
                    <td><?= $statistic["question_{$i}_sum"] ?></td>
                    <td><?= $statistic["question_{$i}_avg"] ?></td>
                    <td>0</td>
                </tr>
            <?php endfor; ?>

            </tbody>
        </table>
    </div>

</div>
