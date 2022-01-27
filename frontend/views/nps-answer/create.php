<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;

?>
<div class="main-container">

    <!-- Page header end -->
    <!-- Row start -->
    <div class="accordion-container">
        <div class="accordion-header" id="withIconOne">
            <?php $form = ActiveForm::begin(["id" => "nps-form"]); ?>
            <div class="text-left"><h3>Опитування клієнтів</h3></div>

            <br>
            <br>

            <!-- Row start -->
            <div class="row gutters">
                <div class="col-12">
                    <!-- Wizard start -->

                    <div id="example-basic">
                        <h3>-------------------------</h3>
                        <section>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="accordion" id="withIconsAccordion">


                                        <br>
                                        <br>


                                        <div class="accordion-container">

                                            <div class="accordion-header" id="withIconOne">
                                                <div class="card-body">

                                                    <div class="text-center"><h3><?= $i18n['question_1'] ?></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="text-center"><font color="#45b371"></font>
                                        </div>


                                    </div>

                                    <div class="card-body">

                                        <div class="text-center"><h3></h3>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-header">


                                                <!-- Row start -->
                                                <div class="row gutters">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">


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


                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                            </td>
                                                                            <?=
                                                                            $form->field($model, "question_1")
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
                                                                                    ],
                                                                                    [
                                                                                        'item' => function ($index, $label, $name, $checked, $value) {
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


                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>


                        </section>
                        <h3>-------------------------</h3>
                        <section>
                            <div class="card-body">

                                <div class="text-center"><h3><?= $i18n['text_1'] ?>
                                    </h3>
                                </div>
                            </div>


                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">

                                    <div class="card-body">

                                        <div class="form-group">
                                            <?= $form->field($model, 'text_1')->textarea([
                                                'class' => 'form-control',
                                                'rows' => '3',
                                            ])->label(false) ?>

                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="text-center">
                                    <h3>
                                        <?= $i18n['text_2'] ?>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">


                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title"></div>
                                                </div>
                                                <div class="card-body">

                                                    <div class="form-group">

                                                        <?= $form->field($model, 'text_2')->textarea([
                                                            'class' => 'form-control',
                                                            'rows' => '3',
                                                        ])->label(false) ?>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>


                        </section>
                        <h3>-------------------------</h3>
                        <?= $this->render('_ask-page', [
                            'questions' => array_slice($i18n, 1, 7),
                            'form' => $form,
                            'model' => $model,
                            'i18n' => $i18n

                        ]); ?>
                        <h3>-------------------------</h3>
                        <?= $this->render('_ask-page', [
                            'questions' => array_slice($i18n, 8, 10),
                            'form' => $form,
                            'model' => $model,
                            'i18n' => $i18n

                        ]); ?>
                        <h3>-------------------------</h3>
                        <?= $this->render('_ask-page', [
                            'questions' => array_slice($i18n, 18, 7),
                            'form' => $form,
                            'model' => $model,
                            'i18n' => $i18n

                        ]); ?>
                        <h3>-------------------------</h3>
                        <?= $this->render('_ask-page', [
                            'questions' => array_slice($i18n, 25, 5),
                            'form' => $form,
                            'model' => $model,
                            'i18n' => $i18n

                        ]); ?>
                        <h3>&nbsp;</h3>
                        <section>    <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                    <div class="jumbotron text-center">
                                        <h1 class="display-4 text-primary mb-5"><?= $i18n['thanks_1'] ?></h1>
                                        <p class="lead"><?= $i18n['thanks_2'] ?></p>
                                        <p><?= $i18n['team'] ?></p>
                                        <div class="mb-5"></div>

                                    </div>

                                </div>
                            </div>
                            <!-- Row end --></section>
                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="card-body">
        <div class="text-right">
            <!-- Buttons -->


        </div>
    </div>

</div>


<!-- Steps wizard JS -->
<link rel="stylesheet" href="/vendor/wizard/jquery.steps.css"/>
<script src="/vendor/wizard/jquery.steps.min.js" defer></script>
<script src="/vendor/wizard/jquery.steps.custom.js" defer></script>
<script defer>
    var els = document.getElementsByTagName("a");
    for (var i = 0, l = els.length; i < l; i++) {
        var el = els[i];
        console.log(el);
        if (el.href === '#finish') {
            el.innerHTML = "dead link";
            el.href = "#";
        }
    }

</script>