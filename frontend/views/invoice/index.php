<?php
/* @var $this yii\web\View */
?>
<div class="main-container-1">




    <!-- Page header end -->
    <!-- Row start -->

    <br>

    <BR>
    <br>




    <br>


    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="row gutters" >

            <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center">



                </div>
            </div>

        </div>
    </div>
</div>


<!-- Row end -->

<!-- Row start -->
<!-- Row start -->
<div class="row gutters">

    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
                <div class="accordion align-center" id="withIconsAccordion">
                    <div class="accordion-header" id="withIconTwo">

                        <i class="icon icon-"></i>&nbsp;&nbsp;Рахунок на предоплату
                        <br>
                        <br>

                        </a>
                    </div>

<!--                    <div class="accordion-container">-->
<!--                        <div class="accordion-header" id="withIconOne">-->
<!---->
<!--                            <i class="icon icon-info2"></i> &nbsp;&nbsp;Для того, щоб створити новий рахунок, натисніть "Створити Запит"-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <div id="collapseWithIconOne" class="collapse show" aria-labelledby="withIconOne" data-parent="#withIconsAccordion">-->
<!--                            <div class="accordion-body">-->
<!--                                <div class="row gutters">-->
<!---->
<!---->
<!--                                    <div class="col-xl-11 col-lg-12 col-md-12 col-sm-12 col-12 text-right">-->
<!---->
<!--                                        <button class="btn btn-primary " type="submit">Створити запит</button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div></div>-->

                    <?php foreach ($invoices as $invoice): ?>
                        <div class="accordion-container">

                            <div id="collapseWithIconTwo" class="collapse show" aria-labelledby="withIconTwo" data-parent="#withIconsAccordion">
                                <div class="accordion-body">
                                    <div class="row gutters">
                                        <div class="col-xl-1 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <br> <br>

                                                <h7><?php echo $invoice->id ?>.</h7>

                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group"><br><br>
                                                <h7>Рахунок № <?php echo $invoice->number ?></h7>

                                            </div>
                                        </div>

                                        <div class="col-xl-2 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group"><br><br>
                                                <h7>Дата <?php echo $invoice->data ?></lh7>

                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group"><br><br>
                                                <h7>Марка цементу: <?php echo $invoice->product->title ?></h7>

                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                            <br><br>
                                            <a class="btn btn-primary btn-sm" href="/uploads/" download="<?php echo $invoice->filepath ?>">Завантажити</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

