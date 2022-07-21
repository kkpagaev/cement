<?php

use common\models\one_c\Order;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \common\models\forms\OrderForm */
/* @var $contracts array */
/* @var $pickupAddresses array */
/* @var $recipients array */
$this->title = 'Розмістини заявку';
?>


<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
    </div>
</div>


<?php if(!$model->isUpdate && !$model->isCopy): ?>
<div class="main-container-1">


    <!-- Page header end -->
    <!-- Row start -->

    <br>

    <BR>
    <br>


    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="row gutters">

            <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center">


                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
                        <div class="social-tile" >
                            
                            <div class="social-icon bg-info" 
                            <?php if($model->scenario == Order::SCENARIO_AUTO) echo 'style="background-color: #007bff !important;"'; ?>>
                                <a href="/place-order/auto"><i class="icon-truck"></i></a>
                            </div>
                            <div>Доставка Авто</div>
                            <h5></h5>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
                        <div class="social-tile">
                            <div class="social-icon bg-info"
                            <?php if($model->scenario == Order::SCENARIO_SELF_PICKUP) echo 'style="background-color: #007bff !important;"'; ?>
                            >
                                <a href="/place-order/selfpickup"><i class="icon-truck"></i> </a>

                            </div>
                            <div>Самовивіз</div>
                            <h5></h5>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
                        <div class="social-tile">
                            <div class="social-icon bg-info"
                            <?php if($model->scenario == Order::SCENARIO_RAILWAY) echo 'style="background-color: #007bff !important;"'; ?>
                            
                            >
                                <a href="/place-order/railway"><i class="icon-truck"></i></a>
                            </div>
                            <div>Доставка ЗТ</div>
                            <h5></h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php elseif($model->isUpdate): ?>
    <div class="main-container-1">


        <!-- Page header end -->
        <!-- Row start -->

        <br>

        <BR>
        <br>


        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row gutters">

                <div class="container h-100">
                    <div class="row h-100 justify-content-center align-items-center">

                        <h2>
                            Заявка № <?php echo $model->order->getAttribute('id'); ?>

                        </h2>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<?php if($model->scenario == \common\models\forms\OrderForm::SCENARIO_AUTO): ?>

    <!-- Row end -->

    <!-- Row start -->
    <!-- Row start -->
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


                        <div class="accordion-container">
                            <div class="accordion-header" id="withIconTwo">

                                <i class="icon icon-info2"></i>&nbsp;&nbsp;Дані замовника
                                </a>
                            </div>
                            <div id="collapseWithIconTwo" class="collapse show" aria-labelledby="withIconTwo"
                                 data-parent="#withIconsAccordion">
                                <div class="accordion-body">
                                    <div class="row gutters">
                                        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Договір на поставку</label>
                                                <?php echo $form->field($model->order, 'contract_id')
                                                    ->dropDownList(
                                                        $contracts,
                                                        array('prompt' => 'Оберіть договір', 'id' => 'contract_id')  // options
                                                    )->label(false);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Пункт відвантаження</label>
                                                <?php echo $form->field($model->order, 'pickup_address_id')
                                                    ->dropDownList(
                                                        $pickupAddresses,
                                                        array('prompt' => 'Оберіть Пункт відвантаження')  // options
                                                    )->label(false);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Адреса вантажоодержувача</label>

                                                <?php
                                                echo $form->field($model->order, 'shipping_address_id')
                                                    ->dropDownList(
                                                        [],
                                                        array('prompt' => 'Оберіть Адресу вантажоодержувача')  // options
                                                    )->label(false);
                                                ?>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-container" id="order-items">
                            <div class="accordion-header" id="withIconOne">

                                <i class="icon icon-info2"></i> &nbsp;&nbsp;Дані замовлення
                                </a>
                            </div>
                            <?php foreach ($model->items as $id => $order_item): ?>
                                <div id="collapseWithIconOne" class="collapse show" aria-labelledby="withIconOne"
                                     data-parent="#withIconsAccordion">
                                    <div class="accordion-body" >
                                        <div class="row gutters" id="order-item-0">
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3" >

                                                <?php echo $form->field($order_item, 'product_id')
                                                    ->dropDownList(
                                                        $products,
                                                        [
                                                            'id' => "order_item_{$id}_product_id",
                                                            'class' => 'form-control product_id',

                                                            'name' => "Item[$id][product_id]",
                                                        ]  // options
                                                    )->label(false);
                                                ?>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
                                                <div class="form-group">
                                                    <?= $form->field($order_item, "weight")->label(false)->textInput([
                                                        'id' => "order_item_{$id}_weight",
                                                        'name' => "Item[$id][weight]",
                                                        'placeholder' => "Вага",
                                                        'type' => 'number'


                                                    ]) ?>
                                                </div>

                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
                                                <div class="form-group">
                                                    <?= $form->field($order_item, "order_date")->label(false)->textInput([
                                                        'id' => "order_item_{$id}_order_date",
                                                        'name' => "Item[$id][order_date]",
                                                        'placeholder' => "Дата",
                                                        'type' => 'date'
                                                    ]) ?>
                                                </div>


                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">

                                                <div class="form-group">

                                                    <div class="form-group">
                                                        <?= $form->field($order_item, "order_time")->label(false)->textInput([
                                                            'id' => "order_item_{$id}_order_time",
                                                            'name' => "Item[$id][order_time]",
                                                            'placeholder' => "Час",
                                                            'type' => 'time'

                                                        ]) ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

                                                <button class="btn btn-primary" type="button" onclick="addOrderItem()">Додати ще</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>

                        <div class="accordion-container">
                            <div class="accordion-header" id="withIconThree">

                                <i class="icon icon-info2"></i>&nbsp;&nbsp;Дані доставки
                                </a>
                            </div>
                            <div id="collapseWithIconThree" class="collapse show" aria-labelledby="withIconThree"
                                 data-parent="#withIconsAccordion">
                                <div class="accordion-body" >

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


<!-- Row end -->
<br>
        <div class="col-xl-12 col-lg-12 col-md-10 col-sm-10 col-10">

            <div class="text-center">

                <div class="card-title">

                    Чи потрібен Вам буде рахунок на предоплату?
                </div>
            </div>
            <br>
            <div class="text-center">


                <div class="custom-control custom-checkbox">


                    <input type="hidden" name="Order[invoice_needed]"  value="<?= $model->order->invoice_needed?>"><input type="checkbox" id="order-invoice_needed" class="custom-control-input" name="Order[invoice_needed]" value="1">


                    <label class="custom-control-label" for="order-invoice_needed">Так</label>
                </div>


            </div>
        </div>


<!-- Row end -->
<div class="col-xl-12 col-lg-12 col-md-10 col-sm-10 col-10">

    <div class="text-center">
        <br>
        <br>
        <br>

        <?php if(!$model->isUpdate): ?>
            <?= Html::submitButton('Створити заявку', ['class' => 'btn btn-primary']) ?>


        <?php else: ?>
            <?= Html::submitButton('Оновити заявку', ['class' => 'btn btn-primary']) ?>

        <?php endif; ?>

    </div>
</div>
<?php
$form->errorSummary($model);
ActiveForm::end() ?>
<?php endif; ?>
<!-- Row end -->
<?php if($model->scenario == \common\models\forms\OrderForm::SCENARIO_SELF_PICKUP): ?>

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


                        <div class="accordion-container">
                            <div class="accordion-header" id="withIconTwo">

                                <i class="icon icon-info2"></i>&nbsp;&nbsp;Дані замовника
                                </a>
                            </div>
                            <div id="collapseWithIconTwo" class="collapse show" aria-labelledby="withIconTwo"
                                 data-parent="#withIconsAccordion">
                                <div class="accordion-body">
                                    <div class="row gutters">
                                        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Договір на поставку</label>
                                                <?php echo $form->field($model->order, 'contract_id')
                                                    ->dropDownList(
                                                        $contracts,
                                                        array('prompt' => 'Оберіть договір', 'id' => 'contract_id')  // options
                                                    )->label(false);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Пункт відвантаження</label>
                                                <?php echo $form->field($model->order, 'pickup_address_id')
                                                    ->dropDownList(
                                                        $pickupAddresses,
                                                        array('prompt' => 'Оберіть Пункт відвантаження')  // options
                                                    )->label(false);
                                                ?>
                                            </div>
                                        </div>

                                        <!--                                    <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">-->
                                        <!--                                        <div class="form-group">-->
                                        <!--                                            <label for="inputName">Адреса вантажоодержувача</label>-->
                                        <!--                                            --><?php //echo $form->field($model->order, 'shipping_address_id')
                                        //                                                ->dropDownList(
                                        //                                                    [],
                                        //                                                    array('prompt' => 'Оберіть Адресу вантажоодержувача')  // options
                                        //                                                )->label(false);
                                        //                                            ?>
                                        <!--                                        </div>-->
                                        <!--                                    </div>-->


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-container"  id="order-items">
                            <div class="accordion-header" id="withIconOne">

                                <i class="icon icon-info2"></i> &nbsp;&nbsp;Дані замовлення
                                </a>
                            </div>
                            <?php foreach ($model->items as $id => $order_item): ?>
                                <div id="collapseWithIconOne" class="collapse show" aria-labelledby="withIconOne"
                                     data-parent="#withIconsAccordion">
                                    <div class="accordion-body">
                                        <div class="row gutters" id="order-item-0">
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3" >

                                                <?php echo $form->field($order_item, 'product_id')
                                                    ->dropDownList(
                                                        $products,
                                                        [
                                                            'id' => "order_item_{$id}_product_id",
                                                            'class' => 'form-control product_id',

                                                            'name' => "Item[$id][product_id]",
                                                        ]  // options
                                                    )->label(false);
                                                ?>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
                                                <div class="form-group">
                                                    <?= $form->field($order_item, "weight")->label(false)->textInput([
                                                        'id' => "order_item_{$id}_weight",
                                                        'name' => "Item[$id][weight]",
                                                        'placeholder' => "Вага",
                                                        'type' => 'number'

                                                    ]) ?>
                                                </div>

                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
                                                <div class="form-group">
                                                    <?= $form->field($order_item, "order_date")->label(false)->textInput([
                                                        'id' => "order_item_{$id}_order_date",
                                                        'name' => "Item[$id][order_date]",
                                                        'placeholder' => "Дата",
                                                        'type' => 'date'

                                                    ]) ?>
                                                </div>


                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

                                                <button class="btn btn-primary" type="button" onclick="addOrderItem()">Додати ще</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>

                        <div class="accordion-container">
                            <div class="accordion-header" id="withIconThree">

                                <i class="icon icon-info2"></i>&nbsp;&nbsp;Дані доставки
                                </a>
                            </div>
                            <div id="collapseWithIconThree" class="collapse show" aria-labelledby="withIconThree"
                                 data-parent="#withIconsAccordion">
                                <div class="accordion-body" >
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


    <!-- Row end -->
    <br>
        <div class="col-xl-12 col-lg-12 col-md-10 col-sm-10 col-10">

            <div class="text-center">

                <div class="card-title">

                    Чи потрібен Вам буде рахунок на предоплату?
                </div>
            </div>
            <br>
            <div class="text-center">


                <div class="custom-control custom-checkbox">


                    <input type="hidden" name="Order[invoice_needed]" value="<?= $model->order->invoice_needed?>"><input type="checkbox" id="order-invoice_needed" class="custom-control-input" name="Order[invoice_needed]" value="1">


                    <label class="custom-control-label" for="order-invoice_needed">Так</label>
                </div>


            </div>
        </div>

    <!-- Row end -->
    <div class="col-xl-12 col-lg-12 col-md-10 col-sm-10 col-10">

        <div class="text-center">
            <br>
            <br>
            <br>

            <?php if(!$model->isUpdate): ?>
                <?= Html::submitButton('Створити заявку', ['class' => 'btn btn-primary']) ?>


            <?php else: ?>
                <?= Html::submitButton('Оновити заявку', ['class' => 'btn btn-primary']) ?>

            <?php endif; ?>

        </div>
    </div>
    <?php
    $form->errorSummary($model);
    ActiveForm::end() ?>
<?php endif; ?>
<!-- Row end -->
<?php if($model->scenario == \common\models\forms\OrderForm::SCENARIO_RAILWAY): ?>

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


                        <div class="accordion-container">
                            <div class="accordion-header" id="withIconTwo">

                                <i class="icon icon-info2"></i>&nbsp;&nbsp;Дані замовника
                                </a>
                            </div>
                            <div id="collapseWithIconTwo" class="collapse show" aria-labelledby="withIconTwo"
                                 data-parent="#withIconsAccordion">
                                <div class="accordion-body">
                                    <div class="row gutters">
                                        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Договір на поставку</label>
                                                <?php echo $form->field($model->order, 'contract_id')
                                                    ->dropDownList(
                                                        $contracts,
                                                        array('prompt' => 'Оберіть договір', 'id' => 'contract_id')  // options
                                                    )->label(false);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Пункт відвантаження</label>
                                                <?php echo $form->field($model->order, 'pickup_address_id')
                                                    ->dropDownList(
                                                        $pickupAddresses,
                                                        array('prompt' => 'Оберіть Пункт відвантаження')  // options
                                                    )->label(false);
                                                ?>
                                            </div>
                                        </div>
<!-- 
                                        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Адреса вантажоодержувача</label>
                                                <?php 
                                                /* echo $form->field($model->order, 'shipping_address_id')
                                                    ->dropDownList(
                                                        [],
                                                        array('prompt' => 'Оберіть Адресу вантажоодержувача')  // options
                                                    )->label(false);
                                                */?>
                                            </div>
                                        </div>
 -->

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-container" id="order-items">
                            <div class="accordion-header" id="withIconOne">

                                <i class="icon icon-info2"></i> &nbsp;&nbsp;Дані замовлення
                                </a>
                            </div>
                            <?php foreach ($model->items as $id => $order_item): ?>
                                <div id="collapseWithIconOne" class="collapse show" aria-labelledby="withIconOne"
                                     data-parent="#withIconsAccordion">
                                    <div class="accordion-body" >
                                        <div class="row gutters" id="order-item-0">
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3" >

                                                <?php echo $form->field($order_item, 'product_id')
                                                    ->dropDownList(
                                                        $products,
                                                        [
                                                            'id' => "order_item_{$id}_product_id",
                                                            'class' => 'form-control product_id',
                                                            'name' => "Item[$id][product_id]",
                                                        ]  // options
                                                    )->label(false);
                                                ?>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
                                                <div class="form-group">
                                                    <?= $form->field($order_item, "weight")->label(false)->textInput([
                                                        'id' => "order_item_{$id}_weight",
                                                        'name' => "Item[$id][weight]",
                                                        'placeholder' => "Вага",
                                                        'type' => 'number'

                                                    ]) ?>
                                                </div>

                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3" >

                                                <?php echo $form->field($order_item, 'wagon_type_id')
                                                    ->dropDownList(
                                                        $wagonTypes,
                                                        [
                                                            'id' => "order_item_{$id}_wagon_type_id",
                                                            'name' => "Item[$id][wagon_type_id]",
                                                            'prompt' => 'Тип вагону',

                                                        ]  // options
                                                    )->label(false);
                                                ?>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

                                                <button class="btn btn-primary" type="button" onclick="addOrderItem()">Додати ще</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>

                        <div class="accordion-container">
                            <div class="accordion-header" id="withIconThree">

                                <i class="icon icon-info2"></i>&nbsp;&nbsp;Дані доставки
                                </a>
                            </div>
                            <div id="collapseWithIconThree" class="collapse show" aria-labelledby="withIconThree"
                                 data-parent="#withIconsAccordion">
                                <div class="accordion-body" >

                                    <div class="row gutters">

                                        <div class="col-xl-6 col-lglg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Вантажоодержувач</label>

                                                <?php echo $form->field($model->order, 'consignee_id')
                                                    ->dropDownList(
                                                        $consignees
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


    <!-- Row end -->
    <br>
        <div class="col-xl-12 col-lg-12 col-md-10 col-sm-10 col-10">

            <div class="text-center">

                <div class="card-title">

                    Чи потрібен Вам буде рахунок на предоплату?
                </div>
            </div>
            <br>
            <div class="text-center">


                <div class="custom-control custom-checkbox">


                    <input type="hidden" name="Order[invoice_needed]" value="<?= $model->order->invoice_needed?>"><input type="checkbox" id="order-invoice_needed" class="custom-control-input" name="Order[invoice_needed]" value="1">


                    <label class="custom-control-label" for="order-invoice_needed">Так</label>
                </div>


            </div>
        </div>

    <!-- Row end -->
    <div class="col-xl-12 col-lg-12 col-md-10 col-sm-10 col-10">

        <div class="text-center">
            <br>
            <br>
            <br>
            <?php if(!$model->isUpdate): ?>
                <?= Html::submitButton('Створити заявку', ['class' => 'btn btn-primary']) ?>


            <?php else: ?>
                <?= Html::submitButton('Оновити заявку', ['class' => 'btn btn-primary']) ?>

            <?php endif; ?>

        </div>
    </div>
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
