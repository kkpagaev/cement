<?php 
$this->title = 'Мої фінанси';
?>
<div class="main-container">

<!-- Page header start -->
<div class="page-header">

    <!-- Breadcrumb start -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Фінансова Історія</li>
    </ol>
    <!-- Breadcrumb end -->



</div>
<!-- Page header end -->

<!-- Row start -->
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                shipment_date - дата відвантадження
payment_date - дата оплати 
payments_days - днів до оплати
payments_sum - сума до оплати
shipment_sum - сума відвантаження

                    <table class="table table-hover table-bordered m-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Номер договору</th>
                                <th>Дата відвантадження</th>

                                <th>Статус</th>

                                <th class="text-right">Дата створення</th>
                                <th class="text-right">Дата оновлення</th>
                                <th class="text-right">Дата закриття</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach ($payments as $key => $payment): ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td>Договір №<?= $payment->contract_id  ?>, від <?= $payment->contract->date_from?></td>

                                <td class="text-right"><?= $payment->shipment_date  ?></td>

                                <td><span class="badge badge-danger">Чекає на оплату</span></td>

                                <td class="text-right">Aug-10, 2019</td>
                                <td class="text-right">Sep-14, 2019</td>
                                <td class="text-right">Oct-20, 2019</td>
                            </tr>
                            <?php endforeach; ?>
                            
                     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Row end -->

</div>