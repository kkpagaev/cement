<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div
        class="row gutters
					">
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

        <div class="card">


            <div id="carouselExampleCaptions" class="carousel slide m-0" data-ride="carousel">


                <div class="carousel-inner">
                    <?php foreach ($slider as $key => $slide): ?>
                    <div class="carousel-item <?php if($key == 0) echo "active"; ?>">
                        <img src="<?= $slide->image_filepath ?>" width="600" height="370" class="rounded d-block w-100"
                             alt="Carousel">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>&nbsp;&nbsp;&nbsp;&nbsp;<?= $slide->title ?></h5>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $slide->subtitle ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>

    </div>


    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

        <div class="card h-90">
            <div class="card-body">
                <div class="account-settings">
                    <div class="user-profile">
                        <div class="user-avatar"></div>


                        <h5 class="user name">Мої фінанси</h5>

                        <br>

                        <h5 class="user name">Доступна сума до відвантаження</h5><br>
                        <h3 class="user-name">1 394 333</h3>

                        <div class="USER-NAME">
                            <h8>Останні надходження:</h8>


                            <div class="USER-NAME">11-06-21:<br>

                                <h9><font strong color="#208451">+ 150 403 грн </font> &nbsp;згідно рахунку №
                                    433214324425
                                </h9>
                                <br>
                                <h9><font strong color="#208451">+ 150 705 грн </font> &nbsp;згідно рахунку №
                                    443414324466
                                </h9>
                            </div>
                            <p></p>
                            <p></p>
                            <br>


                        </div>
                        <a href="table-hover.html">
                            <div class="user-name">
                                <button type="button" id="submit" name="submit" class="btn btn-secondary" align="center"
                                        margin-right: 25%>&#160;&#160;&#160;&#160;&#160; 1 протермінований рахунок&#160;&#160;&#160;&#160;&#160;&#160
                                </button>
                                <p></p>
                        </a>
                        <a href="table-hover.html">
                            <button type="button" id="submit" name="submit" class="btn btn-primary" align="center"
                                    margin-right: 25%>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160&#160;&#160;&#160;&#160;&#160&#160;Детальніше&#160;&#160;&#160;&#160;&#160;&#160&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
                                &#160;&#160;
                            </button>
                        </a>
                    </div>

                </div>


            </div>


        </div>


    </div>
</div>


<!-- Row end -->
<br>
<br>
<!-- Row start -->
<br>
<br>
<div class="row gutters">
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Мої замовлення</div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table projects-table">
                        <thead>
                        <tr>
                            <th>Номер замовлення</th>
                            <th>Статус</th>
                            <th>Марка цементу</th>
                            <th>Тип доставки</th>
                            <th>Пункт доставки</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($orders as $order): ?>

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
                                                <?php if($order->status == 0): ?>
                                                    У обробці
                                                <?php else: ?>
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
                                                <i class=""></i> ПЦ 2 АШ 400
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="project-details">
                                        <div class="project-info">
                                            <p>  <?php if($order->delivery_type == 0): ?>
                                                    Авто доставка

                                                <?php elseif($order->delivery_type == 1): ?>
                                                    Самовивіз
                                                <?php else: ?>
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
                                                <?php if($order->delivery_type == 0): ?>
                                                    <?php echo $order->shippingAdress->address_auto ?>
                                                <?php elseif($order->delivery_type == 1): ?>
                                                    <?php echo $order->pickupAddress->address ?>
                                                <?php else: ?>
                                                    <?php echo $order->shippingAdress->addressStation->fullname ?>

                                                <?php endif; ?></p>
                                            <p></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="project-details">
                                        <div class="project-info">
                                            <font color="#000000"><a href="/place-order">Детальніше...</a></font>
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
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
        <div class="row gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="social-tile">
                    <div class="social-icon bg-info">
                        <a href="/place-order/auto"><i class="icon-truck"></i></a href>
                    </div>
                    <div>Розмістити заявку</div>
                    <h5></h5>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="social-tile">
                    <div class="social-icon bg-info">
                        <a href="#"><i class="icon-shopping-bag"></i></a>
                    </div>
                    <div>Сформувати звіт</div>
                    <h5></h5>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="social-tile">
                    <div class="social-icon bg-info">
                        <a href="/invoice"><i class="icon-shopping-bag1"></i></a>
                    </div>
                    <div>Отримати рахунок</div>
                    <h5></h5>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="social-tile">
                    <div class="social-icon bg-info">
                        <a href="/act"><i class="icon-shopping-bag1"></i></a>
                    </div>
                    <div>Отримати акт звірки</div>
                    <h5></h5>
                </div>
            </div>

        </div>
        <!-- Row end -->
    </div>
    <!-- Row start -->
</div>


<!-- Row end -->

<!-- Row start -->


<!-- Gallery start -->
<div class="baguetteBoxThree gallery">
    <div class="row gutters">
        <div class="col-xl-4 col-lg-3 col-md-3 col-sm-3 col-3">
            <a href="/nps-answer" class="effects">
                <img src="/img/121421.png" class="img-fluid" alt="Tycoon Admin">
                <div class="overlay">
                    <span class="expand"> NPS Рейтинг </span>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Статистика замовлень</div>
                </div>
                <div class="card-body">
                    <div id="basic-column-graph"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-3 col-md-3 col-sm-3 col-3">
            <a href="/news" class="effects">
                <img src="/img/7522720.png" class="img-fluid" alt="Tycoon Admin">
                <div class="overlay">
                    <span class="expand">Новини</span>
                </div>
            </a>
        </div>
        <!-- Gallery end -->
        <!-- Row end -->
        <!-- Row start -->
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <!-- Footer start -->
        <div class="col-12">
            <div class="footer"><br><br>
                <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ПрАТ "Кривий Ріг Цемент"</a>
                <div class="social-btns"><a href="#" class="social-icon icon-youtube-with-circle"></a>

                </div>
            </div>
            <!-- Footer end -->
        </div>
    </div>
    <!-- Row end -->
</div>
<!-- Container fluid end -->
</div>
<!-- Page content end -->