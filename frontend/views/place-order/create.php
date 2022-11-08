<?php

use common\models\forms\OrderForm;
use common\models\one_c\Consignee;
use common\models\one_c\Order;
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

<?php
$form = ActiveForm::begin([
    'id' => 'auto-form',
    'options' => ['class' => 'form-horizontal'],
]);
$model->errorSummary($form);
?>
<input value="<?php
                switch ($model->scenario) {
                    case OrderForm::SCENARIO_AUTO:
                        echo "0";
                        break;

                    case OrderForm::SCENARIO_SELF_PICKUP:
                        echo "1";
                        break;
                    case OrderForm::SCENARIO_RAILWAY:
                        echo "2";
                        break;
                } ?>" type="hidden" id="delivery_type" name="delivery_type" />
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

                    <?php
                    echo $this->render('_shipping-details', [
                        'model' => $model,
                        'form' => $form,
                    ]);
                    ?>
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

<br>
<br>
<br>
<br>

<!-- Row end -->

<script src="/js/place-order.js" defer></script>