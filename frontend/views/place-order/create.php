<?php

use common\models\one_c\Consignee;
use common\models\one_c\Product;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \common\models\forms\OrderForm */
/* @var $contracts array */
/* @var $pickupAddresses array */
/* @var $recipients array */

$products = (function ($products) {
    $result = [];
    foreach ($products as $el) {
        $result[$el->c1_id] = $el->title;
    }
    return $result;
})(Product::getPlaceOrderProducts($model->order->contract_id, $model->order->pickup_address_id));

$this->title = 'Розмістини заявку';
?>


<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
    </div>
</div>

<?php
echo $this->render('_heading', [
    'model' => $model,
]);
?>
<?php if ($model->scenario == \common\models\forms\OrderForm::SCENARIO_AUTO) : ?>
    <?php
    $form = ActiveForm::begin([
        'id' => 'auto-form',
        'options' => ['class' => 'form-horizontal'],
    ]);
    ?>
    <input type="hidden" id="delivery_type" value="0">
    <div class="row gutters">
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
                    <div class="accordion align-center" id="withIconsAccordion">
                        <?php
                        echo $this->render('_customer-details', [
                            'model' => $model,
                            'form' => $form,
                        ]);
                        ?>
                        <?php
                        echo $this->render('_order-details', [
                            'model' => $model,
                            'form' => $form,
                        ]);
                        ?>
                        <div class="accordion-container">
                            <div class="accordion-header" id="withIconThree">

                                <i class="icon icon-info2"></i>&nbsp;&nbsp;Дані доставки
                                </a>
                            </div>
                            <div id="collapseWithIconThree" class="collapse show" aria-labelledby="withIconThree" data-parent="#withIconsAccordion">
                                <div class="accordion-body">

                                    <div class="row gutters">
                                        <div class="col-xl-6 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Особа відповідальна за прийом та
                                                    розвантаження</label>

                                                <div class="form-group">
                                                    <?= $form->field($model->order, 'consignee_fullname', [
                                                        'inputOptions' => [
                                                            'placeholder' => 'П.І.Б.',
                                                            'class' => 'form-control',
                                                        ]
                                                    ])->label(false) ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Контактний телефон відповідальної особи </label>


                                                <div class="form-group">
                                                    <?= $form->field($model->order, 'consignee_phone', [
                                                        'inputOptions' => [
                                                            'placeholder' => '+380___ __ __',
                                                            'class' => 'form-control',

                                                        ]
                                                    ])->label(false) ?>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    echo $this->render('_invoice-need', [
        'model' => $model,
    ]);
    ?>

    <?php
    echo $this->render('_button', [
        'model' => $model,
    ]);
    ?>
    <?php
    $form->errorSummary($model);
    ActiveForm::end() ?>
<?php endif; ?>
<!-- Row end -->
<?php if ($model->scenario == \common\models\forms\OrderForm::SCENARIO_SELF_PICKUP) : ?>
    <!-- Row start -->
    <!-- Row start -->
    <?php
    $form = ActiveForm::begin([
        'id' => 'auto-form',
        'options' => ['class' => 'form-horizontal'],
    ]);
    $model->errorSummary($form);
    ?>
    <div class="row gutters">
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
                    <div class="accordion align-center" id="withIconsAccordion">
                        <?php
                        echo $this->render('_customer-details', [
                            'model' => $model,
                            'form' => $form,
                        ]);
                        ?>

                        <?php
                        echo $this->render('_order-details', [
                            'model' => $model,
                            'form' => $form,
                        ]);
                        ?>

                        <div class="accordion-container">
                            <div class="accordion-header" id="withIconThree">

                                <i class="icon icon-info2"></i>&nbsp;&nbsp;Дані доставки
                                </a>
                            </div>
                            <div id="collapseWithIconThree" class="collapse show" aria-labelledby="withIconThree" data-parent="#withIconsAccordion">
                                <div class="accordion-body">
                                    <div class="row gutters">
                                        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Водій (ПІБ, тф.ном.)</label>
                                                <div class="form-group">
                                                    <?= $form->field($model->order, 'driver_info', [
                                                        'inputOptions' => [
                                                            'placeholder' => 'П.І.Б.',
                                                            'class' => 'form-control',
                                                        ]
                                                    ])->label(false) ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Номер ТЗ</label>
                                                <div class="form-group">
                                                    <?= $form->field($model->order, 'driver_car_number', [
                                                        'inputOptions' => [
                                                            'placeholder' => 'АЕ____ОК',
                                                            'class' => 'form-control',
                                                        ]
                                                    ])->label(false) ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Номер причепу</label>
                                                <div class="form-group">
                                                    <?= $form->field($model->order, 'driver_car_trailer_number', [
                                                        'inputOptions' => [
                                                            'placeholder' => 'АЕ____ОК',
                                                            'class' => 'form-control',

                                                        ]
                                                    ])->label(false) ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Адреса розвантаження</label>
                                                <div class="form-group">

                                                    <div class="form-group">
                                                        <?= $form->field($model->order, 'unload_address', [
                                                            'inputOptions' => [
                                                                'class' => 'form-control',

                                                            ]
                                                        ])->label(false) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    echo $this->render('_invoice-need', [
        'model' => $model,
    ]);
    ?>
    <?php
    echo $this->render('_button', [
        'model' => $model,
    ]);
    ?>
    <?php
    $form->errorSummary($model);
    ActiveForm::end() ?>
<?php endif; ?>
<!-- Row end -->
<?php if ($model->scenario == \common\models\forms\OrderForm::SCENARIO_RAILWAY) : ?>

    <!-- Row start -->
    <!-- Row start -->
    <?php
    $form = ActiveForm::begin([
        'id' => 'auto-form',
        'options' => ['class' => 'form-horizontal'],
    ]);
    ?>
    <input type="hidden" id="delivery_type" value="1">
    <div class="row gutters">
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
                    <div class="accordion align-center" id="withIconsAccordion">

                        <?php
                        echo $this->render('_customer-details', [
                            'model' => $model,
                            'form' => $form,
                        ]);
                        ?>

                        <?php
                        echo $this->render('_order-details', [
                            'model' => $model,
                            'form' => $form,
                        ]);
                        ?>

                        <div class="accordion-container">
                            <div class="accordion-header" id="withIconThree">

                                <i class="icon icon-info2"></i>&nbsp;&nbsp;Дані доставки
                                </a>
                            </div>
                            <div id="collapseWithIconThree" class="collapse show" aria-labelledby="withIconThree" data-parent="#withIconsAccordion">
                                <div class="accordion-body">

                                    <div class="row gutters">

                                        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Вантажоодержувач</label>

                                                <?php echo $form->field($model->order, 'consignee_id')
                                                    ->dropDownList(
                                                        (function () {
                                                            $arr = Consignee::find()->all();
                                                            $result = [];
                                                            foreach ($arr as $el) {
                                                                $result[$el->c1_id] = $el->fullname;
                                                            }

                                                            return $result;
                                                        })()
                                                    )->label(false);
                                                ?>

                                            </div>
                                            <div class="form-group">

                                                <label for="inputName">Гілка вантажоодержувача</label>

                                                <div class="form-group">
                                                    <?= $form->field($model->order, 'consignee_branch', [
                                                        'inputOptions' => [
                                                            'class' => 'form-control',

                                                        ]
                                                    ])->label(false) ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Код вантажоодержувача </label>


                                                <div class="form-group">
                                                    <?= $form->field($model->order, 'consignee_code', [
                                                        'inputOptions' => [
                                                            'placeholder' => '32454',
                                                            'class' => 'form-control',

                                                        ]
                                                    ])->label(false) ?>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label for="inputName">Графа 7 залізничної накладної (власник вантажу)</label>

                                                <?= $form->field($model->order, 'column_7', [
                                                    'inputOptions' => [
                                                        'class' => 'form-control',

                                                    ]
                                                ])->label(false) ?>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lglg-4 col-md-4 col-sm-4 col-12">

                                        </div>



                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    echo $this->render('_invoice-need', [
        'model' => $model,
    ]);
    ?>
    <?php
    echo $this->render('_button', [
        'model' => $model,
    ]);
    ?>
    <?php
    $form->errorSummary($model);
    ActiveForm::end() ?>
<?php endif; ?>

<br>
<br>
<br>
<br>

<!-- Row end -->

<script src="/js/place-order.js" defer></script>