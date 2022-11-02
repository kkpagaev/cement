<?php
/* @var $this yii\web\View */
/* @var $model \common\models\forms\OrderForm */

use common\models\one_c\Order;

if (!$model->isUpdate && !$model->isCopy) : ?>
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
                            <div class="social-tile">
                                <div class="social-icon bg-info" <?php if ($model->scenario == Order::SCENARIO_AUTO) echo 'style="background-color: #007bff !important;"'; ?>>
                                    <a href="/place-order/auto"><i class="icon-truck"></i></a>
                                </div>
                                <div>Доставка Авто</div>
                                <h5></h5>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
                            <div class="social-tile">
                                <div class="social-icon bg-info" <?php if ($model->scenario == Order::SCENARIO_SELF_PICKUP) echo 'style="background-color: #007bff !important;"'; ?>>
                                    <a href="/place-order/selfpickup"><i class="icon-truck"></i> </a>

                                </div>
                                <div>Самовивіз</div>
                                <h5></h5>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
                            <div class="social-tile">
                                <div class="social-icon bg-info" <?php if ($model->scenario == Order::SCENARIO_RAILWAY) echo 'style="background-color: #007bff !important;"'; ?>>
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
<?php elseif ($model->isUpdate) : ?>
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