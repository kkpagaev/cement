<?php
/* @var $this yii\web\View */
$this->title = 'Заявки';
?>


<div class="main-container-grey">




    <!-- Page header end -->
    <!-- Row start -->



    <br>

    <BR>
    <br>



    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="card-header">
                <div class="card-title">Мої заявки у обробці</div>
            </div>
            <div class="card-body-grey">
                <div class="table-responsive">
                    <table class="table projects-table">
                        <thead>
                            <tr>
                                <th>Номер замовлення</th>
                                <th>Статус</th>
                                <th>Марка цементу</th>
                                <th>Тип доставки</th>
                                <th>Точка доставки</th>
                                <th>Пункт Відвантаження</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>






                            <?php foreach (\common\models\one_c\Order::find()->where(['user_id' => Yii::$app->user->identity->c1_id])->all() as $order) : ?>

                                <tr>
                                    <td>
                                        <div class="project-details">


                                            <div class="project-info">
                                                <p> № <?php echo $order->id ?> від <?php echo $order->id ?></p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="project-details">
                                            <div class="project-info">
                                                <p>
                                                    <?php if ($order->status == 0) : ?>
                                                        У обробці
                                                    <?php else : ?>
                                                        Опрацьовано
                                                    <?php endif; ?>
                                                </p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="project-details">
                                            <div class="project-info">
                                                <div class="status approved">
                                                    <i class=""></i><?php echo $order->productsPreview(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="project-details">
                                            <div class="project-info">
                                                <p> <?php if ($order->delivery_type == 0) : ?>
                                                        Авто доставка

                                                    <?php elseif ($order->delivery_type == 1) : ?>
                                                        Самовивіз
                                                    <?php else : ?>
                                                        Доставка ЗТ
                                                    <?php endif; ?></p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="project-details">
                                            <div class="project-info">
                                                <p>
                                                    <?= $order->deliveryPoint ?>
                                                <p></p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="project-details">
                                            <div class="project-info">
                                                <p>Дніпро, Леніна 2 </p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="project-details">
                                            <div class="project-info">
                                                <p>
                                                <div class="td-actions">
                                                    <a href="/place-order/delete?id=<?= $order->id; ?>" class="icon red" data-toggle="tooltip" data-placement="top" title="Видалити">
                                                        <i class="icon-cancel"></i>
                                                    </a>
                                                    <a href="/place-order/copy?id=<?= $order->id . '&type=' . $order->delivery_type; ?> " class="icon green" data-toggle="tooltip" data-placement="top" title="Копіювати">
                                                        <i class="icon-plus"></i>
                                                    </a>
                                                    <a href="/place-order/update?id=<?= $order->id . '&type=' . $order->delivery_type; ?> " class="icon blue" data-toggle="tooltip" data-placement="top" title="Редагувати">
                                                        <i class="icon-edit"></i>
                                                    </a>
                                                </div>
                                                <p></p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            <?php endforeach; ?>




                        </tbody>
                    </table>
                </div>
                <br>

            </div>
        </div>
    </div>

    <!-- Row end -->



</div>
<!-- Container fluid end -->



<div class="main-container-bg-grey ">




    <!-- Page header end -->
    <!-- Row start -->
    <br>

    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="card-header">
                <div class="card-title-white text-black ">Активні заявки</div>
            </div>
            <div class="card-body-white">
                <div class="table-responsive">
                    <table class="table projects-table">
                        <thead>
                            <tr>
                                <th>Номер замовлення</th>
                                <th>Статус</th>
                                <th>Марка цементу</th>
                                <th>Тип доставки</th>
                                <th>Точка доставки</th>
                                <th>Пункт Відвантаження</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>



                            <?php foreach (\common\models\one_c\Order::find()->where(['user_id' => Yii::$app->user->identity->c1_id])->all() as $order) : ?>

                                <tr>
                                    <td>
                                        <div class="project-details">


                                            <div class="project-info">
                                                <p> № <?php echo $order->id ?> від <?php echo $order->id ?></p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="project-details">
                                            <div class="project-info">
                                                <p>
                                                    <?php if ($order->status == 0) : ?>
                                                        У обробці
                                                    <?php else : ?>
                                                        Опрацьовано
                                                    <?php endif; ?>
                                                </p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="project-details">
                                            <div class="project-info">
                                                <div class="status approved">
                                                    <i class=""></i> <?php echo $order->productsPreview(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="project-details">
                                            <div class="project-info">
                                                <p> <?php if ($order->delivery_type == 0) : ?>
                                                        Авто доставка

                                                    <?php elseif ($order->delivery_type == 1) : ?>
                                                        Самовивіз
                                                    <?php else : ?>
                                                        Доставка ЗТ
                                                    <?php endif; ?></p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="project-details">
                                            <div class="project-info">
                                                <p>
                                                    <?= $order->deliveryPoint ?>
                                                </p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="project-details">
                                            <div class="project-info">
                                                <p>Дніпро, Леніна 2 </p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="project-details">
                                            <div class="project-info">
                                                <p>
                                                <div class="td-actions">
                                                    <a href="#" class="icon red" data-toggle="tooltip" data-placement="top" title="Видалити">
                                                        <i class="icon-cancel"></i>
                                                    </a>
                                                    <a href="#" class="icon green" data-toggle="tooltip" data-placement="top" title="Копіювати">
                                                        <i class="icon-plus"></i>
                                                    </a>

                                                </div>
                                                </p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            <?php endforeach; ?>




                        </tbody>
                    </table>
                </div>
                <br>

            </div>
        </div>
    </div>

    <!-- Row end -->



</div>
<!-- Container fluid end -->