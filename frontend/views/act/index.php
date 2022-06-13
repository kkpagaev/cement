<?php
/* @var $this yii\web\View */

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Акт звірки';
?>
<div class="main-container-1">




    <!-- Page header end -->
    <!-- Row start -->

    <br>

    <BR>
    <br>




    <br>


    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="row gutters" >

            <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center">



                </div>
            </div>

        </div>
    </div>
</div>


<!-- Row end -->

<!-- Row start -->
<!-- Row start -->
<div class="row gutters">

    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
                <div class="accordion align-center" id="withIconsAccordion">
                    <div class="accordion-header" id="withIconTwo">

                        <i class="icon icon-"></i>&nbsp;&nbsp;Створити акт звірки
                        <br>
                        <br>

                        </a>
                    </div>
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                    <div class="accordion-container">
                        <div class="accordion-header" id="withIconOne">

                            <i class="icon icon-info2"></i> &nbsp;&nbsp;Оберіть номер договору, та період за який необхідно створити акт (Формат дати 2022-09-25)
                            </a>
                        </div>
                        <div id="collapseWithIconOne" class="collapse show" aria-labelledby="withIconOne" data-parent="#withIconsAccordion">
                            <div class="accordion-body">
                                <div class="row gutters">
                                    <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 col-3">
                                        <?php echo $form->field($model, 'contract_id')
                                            ->dropDownList(
                                                $contracts,
                                                array('prompt' => 'Оберіть договір')  // options
                                            )->label(false);
                                        ?>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">

                                        <div class="form-group">
                                            <?= $form->field($model, 'date_from', [
                                                'inputOptions' => [
                                                    'placeholder' => 'Дата від',
                                                    'class' => 'form-control',
                                                    'id' => 'date_from'
                                                ]
                                            ])->label(false) ?>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">


                                        <div class="form-group">
                                            <?= $form->field($model, 'date_to', [
                                                'inputOptions' => [
                                                    'placeholder' => 'Дата до',
                                                    'class' => 'form-control',
                                                    'id' => 'date_to'
                                                ]
                                            ])->label(false) ?>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

                                        <button class="btn btn-primary" type="submit">Створити запит</button>
                                    </div>
                                </div>
                            </div>
                        </div></div>

                    <?php ActiveForm::end(); ?>
                    <script href="/js/act.js" defer></script>


                    <?php foreach($acts as $act): ?>
                    <div class="accordion-container">

                        <div id="collapseWithIconTwo" class="collapse show" aria-labelledby="withIconTwo" data-parent="#withIconsAccordion">
                            <div class="accordion-body">
                                <div class="row gutters">
                                    <div class="col-xl-1 col-lglg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <br> <br>

                                            <h7><?= $act->id ?>.</h7>

                                        </div>
                                    </div>

                                    <div class="col-xl-2 col-lglg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group"><br><br>
                                            <h7>Документ № <?= $act->number ?></h7>

                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group"><br><br>
                                            <h7>Період звірки <?= $act->date_to ?> - <?= $act->date_from ?></h7>

                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lglg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group"><br><br>
                                            <h7>Договір № <?= $act->contract_id ?></h7>

                                        </div>
                                    </div>

                                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

                                            <?php if($act->filepath != null): ?>
                                                <br><br>
                                                <a class="btn btn-primary btn-sm" href="/uploads" download="<?php echo $act->filepath ?>">Завантажити</a>
                                            <?php else: ?>
                                                <br>
                                                <span class="btn">Акт в обробці</span>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>





    <!-- Row end -->




    <!-- Row end -->

