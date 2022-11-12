<?php

/* @var $this yii\web\View */
/* @var $model \common\models\forms\OrderForm */

use common\models\one_c\Consignee;
use common\models\one_c\FinalRecipient;
use common\models\one_c\Product;
use common\models\one_c\WagonType;

?>

<?php if ($model->scenario == \common\models\forms\OrderForm::SCENARIO_AUTO) : ?>
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
<?php endif; ?>


<?php if ($model->scenario == \common\models\forms\OrderForm::SCENARIO_SELF_PICKUP) : ?>
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
<?php endif; ?>


<?php if ($model->scenario == \common\models\forms\OrderForm::SCENARIO_RAILWAY) : ?>
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

                            <?php echo $form->field($model->order, 'final_recipient_id')
                                ->dropDownList(
                                    (function () {
                                        $arr = FinalRecipient::find()->where(['user_id' => \Yii::$app->user->getIdentity()->c1_id])->all();
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
<?php endif; ?>