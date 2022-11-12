<?php
/* @var $this yii\web\View */
/* @var $model \common\models\forms\OrderForm */

use common\models\one_c\Contract;
use common\models\one_c\PickupAddress;
use common\models\one_c\Product;
use common\models\one_c\ShippingAddress;
use yii\db\Expression;

function getContracts($user_id)
{
    $contracts = Contract::find()->where(['user_id' => $user_id])->where(['>', 'expired_at', new Expression('NOW()')])->all();
    $result = [];
    foreach ($contracts as $contract) {
        $result[$contract->c1_id] = "Договір №" . $contract->number . " від " . $contract->date_from;
    }
    return $result;
}

function getPickupAddresses()
{
    $user = Yii::$app->user->identity;
    $arr = PickupAddress::find()->where(['user_id' => $user->c1_id])->all();
    $result = [];
    foreach ($arr as $el) {
        $result[$el->c1_id] = $el->address;
    }

    return $result;
}

$contracts = getContracts(Yii::$app->user->getIdentity()->c1_id);
$pickupAddresses = getPickupAddresses();

?>
<?php if ($model->scenario == \common\models\forms\OrderForm::SCENARIO_AUTO) : ?>
    <div class="accordion-container">
        <div class="accordion-header" id="withIconTwo">

            <i class="icon icon-info2"></i>&nbsp;&nbsp;Дані замовника
            </a>
        </div>
        <div id="collapseWithIconTwo" class="collapse show" aria-labelledby="withIconTwo" data-parent="#withIconsAccordion">
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
                                    ShippingAddress::getPlaceOrderShippingAddresses($model->getOrder()->contract_id, $model->getOrder()->pickup_address_id, $model->getOrder()->delivery_type),
                                    array('prompt' => 'Оберіть Адресу вантажоодержувача')  // options
                                )->label(false);
                            ?>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
<?php if ($model->scenario == \common\models\forms\OrderForm::SCENARIO_SELF_PICKUP) : ?>

    <div class="accordion-container">
        <div class="accordion-header" id="withIconTwo">

            <i class="icon icon-info2"></i>&nbsp;&nbsp;Дані замовника
            </a>
        </div>
        <div id="collapseWithIconTwo" class="collapse show" aria-labelledby="withIconTwo" data-parent="#withIconsAccordion">
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
                                                                        //                                            
                                                                        ?>
                    <!--                                        </div>-->
                    <!--                                    </div>-->
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>



<?php if ($model->scenario == \common\models\forms\OrderForm::SCENARIO_RAILWAY) : ?>
    <div class="accordion-container">
        <div class="accordion-header" id="withIconTwo">

            <i class="icon icon-info2"></i>&nbsp;&nbsp;Дані замовника
            </a>
        </div>
        <div id="collapseWithIconTwo" class="collapse show" aria-labelledby="withIconTwo" data-parent="#withIconsAccordion">
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
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>