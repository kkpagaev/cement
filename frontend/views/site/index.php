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
                    <div class="carousel-item active">
                        <img src="/img/npr1.png" width="620" height="370" class="rounded d-block w-100" alt="Carousel">
                        <div class="carousel-caption ">
                            <h5>&nbsp;&nbsp;&nbsp;&nbsp;Вітаємо у кабінеті клієнта "Кривий Ріг Цемент"</h5>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Перейти у профіль</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/img/242142145.png" width="600" height="370" class="rounded d-block w-100"
                             alt="Carousel">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>&nbsp;&nbsp;&nbsp;&nbsp;Розділ мої заявки</h5>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Перейглянути</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/img/412351325315.png" width="600" height="370" class="rounded d-block w-100"
                             alt="Carousel">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>&nbsp;&nbsp;&nbsp;&nbsp;Статуси усіх замовлень</h5>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Переглянути</p>
                        </div>
                    </div>
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


                        <tr>
                            <td>
                                <div class="project-details">


                                    <div class="project-info">
                                        <p> № 321212 від 11.03.2021</p>
                                        <p></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="project-details">
                                    <div class="project-info">
                                        <p>У обробці</p>
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
                                        <p>Авто доставка</p>
                                        <p></p>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="project-details">
                                    <div class="project-info">
                                        <p>Дніпро, Леніна 2</p>
                                        <p></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="project-details">
                                    <div class="project-info">
                                        <font color="#000000"><a href="vsi-zayavky.html">Детальніше...</a></font>
                                        <p></p>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="project-details">


                                    <div class="project-info">
                                        <p> № 321212 від 11.03.2021</p>
                                        <p></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="project-details">
                                    <div class="project-info">
                                        <p>У обробці</p>
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
                                        <p>Авто доставка</p>
                                        <p></p>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="project-details">
                                    <div class="project-info">
                                        <p>Дніпро, Леніна 2</p>
                                        <p></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="project-details">
                                    <div class="project-info">
                                        <font color="#000000"><a href="vsi-zayavky.html">Детальніше...</a></font>
                                        <p></p>
                                    </div>
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <div class="project-details">


                                    <div class="project-info">
                                        <p> № 321212 від 11.03.2021</p>
                                        <p></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="project-details">
                                    <div class="project-info">
                                        <p>У обробці</p>
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
                                        <p>Авто доставка</p>
                                        <p></p>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="project-details">
                                    <div class="project-info">
                                        <p>Дніпро, Леніна 2</p>
                                        <p></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="project-details">
                                    <div class="project-info">
                                        <font color="#000000"><a href="vsi-zayavky.html">Детальніше...</a></font>
                                        <p></p>
                                    </div>
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <div class="project-details">


                                    <div class="project-info">
                                        <p> № 321212 від 11.03.2021</p>
                                        <p></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="project-details">
                                    <div class="project-info">
                                        <p>У обробці</p>
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
                                        <p>Авто доставка</p>
                                        <p></p>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="project-details">
                                    <div class="project-info">
                                        <p>Дніпро, Леніна 2</p>
                                        <p></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="project-details">
                                    <div class="project-info">
                                        <font color="#000000"><a href="vsi-zayavky.html">Детальніше...</a></font>
                                        <p></p>
                                    </div>
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <div class="project-details">

                                    <div class="project-info">
                                        <p> № 321212 від 11.03.2021</p>
                                        <p></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="project-details">
                                    <div class="project-info">
                                        <p>У обробці</p>
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
                                        <p>Авто доставка</p>
                                        <p></p>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="project-details">
                                    <div class="project-info">
                                        <p>Дніпро, Леніна 2</p>
                                        <p></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="project-details">
                                    <div class="project-info">
                                        <font color="#000000"><a href="vsi-zayavky.html">Детальніше...</a></font>
                                        <p></p>
                                    </div>
                                </div>


                            </td>

                            </td>

                        </tr>

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
                        <a href="zayavka-avto.html"><i class="icon-truck"></i></a href>
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
                        <a href="rahunok-na-predoplatu.html"><i class="icon-shopping-bag1"></i></a>
                    </div>
                    <div>Отримати рахунок</div>
                    <h5></h5>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="social-tile">
                    <div class="social-icon bg-info">
                        <a href="akt-zvirky.html"><i class="icon-shopping-bag1"></i></a>
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
            <a href="nps-pre.html" class="effects">
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
            <a href="cards.html" class="effects">
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