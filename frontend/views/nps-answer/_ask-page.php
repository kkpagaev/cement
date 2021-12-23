<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NpsAnswer */
/* @var $form yii\widgets\ActiveForm */
/* @var $questions array */
?>
<section>
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="text-center"><h5><i>За шкалою від 0 до 10, оберіть рівень задоволення
                        від співпраці з нашою компанією</i></h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th></th>
                                <th>0</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>6</th>
                                <th>7</th>
                                <th>8</th>
                                <th>9</th>
                                <th>10</th>
                                <th>Жоден варіант</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($questions as $field => $question): ?>
                            <tr>
                                <td><?= $question ?>
                                </td>
                                <?=
                                $form->field($model, $field)
                                    ->radioList(
                                            [
                                                0 => 0,
                                                1 => 1,
                                                2 => 2,
                                                3 => 3,
                                                4 => 4,
                                                5 => 5,
                                                6 => 6,
                                                7 => 7,
                                                8 => 8,
                                                9 => 9,
                                                10 => 10,
                                                null => null,
                                            ],
                                            [
                                                'item' => function($index, $label, $name, $checked, $value) {
                                                    $return = '<td><div class="form-check form-check-inline align-center">';
                                                    $return .= '<input type="radio" class="form-check-input" name="' . $name . '" value="' . $value . '" tabindex="3">';
                                                    $return .= '</div></td>';
                                                    return $return;
                                                }
                                            ]
                                    )
                                    ->label(false);
                                ?>
                            </tr>
                            </tbody>
                            <?php endforeach; ?>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


