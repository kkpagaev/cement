<?php

/* @var $this yii\web\View */
/* @var $model \common\models\forms\OrderForm */

use common\models\one_c\Product;
use common\models\one_c\WagonType;

$products = (function ($products) {
    $result = [];
    foreach ($products as $el) {
        $result[$el->c1_id] = $el->title;
    }
    return $result;
})(Product::getPlaceOrderProducts($model->order->contract_id, $model->order->pickup_address_id));

$wagonTypes = (function () {
    $arr = WagonType::find()->all();
    $result = [];
    foreach ($arr as $el) {
        $result[$el->c1_id] = $el->title;
    }

    return $result;
})()


?>

<?php if ($model->scenario == \common\models\forms\OrderForm::SCENARIO_SELF_PICKUP) : ?>

    <div class="accordion-container" id="order-items">
        <div class="accordion-header" id="withIconOne">

            <i class="icon icon-info2"></i> &nbsp;&nbsp;Дані замовлення
            </a>
        </div>
        <?php foreach ($model->items as $id => $order_item) : ?>
            <div id="collapseWithIconOne" class="collapse show" aria-labelledby="withIconOne" data-parent="#withIconsAccordion">
                <div class="accordion-body">
                    <div class="row gutters" id="order-item-0">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

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

<?php endif; ?>

<?php if ($model->scenario == \common\models\forms\OrderForm::SCENARIO_AUTO) : ?>
    <div class="accordion-container" id="order-items">
        <div class="accordion-header" id="withIconOne">

            <i class="icon icon-info2"></i> &nbsp;&nbsp;Дані замовлення
            </a>
        </div>
        <?php foreach ($model->items as $id => $order_item) : ?>


            <div id="collapseWithIconOne" class="collapse show" aria-labelledby="withIconOne" data-parent="#withIconsAccordion">
                <div class="accordion-body">
                    <div class="row gutters" id="order-item-0">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

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

<?php endif; ?>

<?php if ($model->scenario == \common\models\forms\OrderForm::SCENARIO_RAILWAY) : ?>
    <div class="accordion-container" id="order-items">
        <div class="accordion-header" id="withIconOne">

            <i class="icon icon-info2"></i> &nbsp;&nbsp;Дані замовлення
            </a>
        </div>
        <?php foreach ($model->items as $id => $order_item) : ?>
            <div id="collapseWithIconOne" class="collapse show" aria-labelledby="withIconOne" data-parent="#withIconsAccordion">
                <div class="accordion-body">
                    <div class="row gutters" id="order-item-0">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

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
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

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

<?php endif; ?>