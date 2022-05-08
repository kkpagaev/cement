<!doctype html>
<html lang="ua">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap4 Dashboard Template">
    <meta name="author" content="ParkerThemes">
    <link rel="shortcut icon" href="/img/fav.png" />

    <!-- Title -->
    <title>Адмін кабінет клієнта</title>


    <!-- *************
        ************ Common Css Files *************
    ************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="/fonts/style.css">
    <!-- Main css -->
    <link rel="stylesheet" href="/css/main.css">
    <!-- Chat css -->
    <link rel="stylesheet" href="/css/chat.css">

    <!-- *************
        ************ Vendor Css Files *************
    ************ -->

</head>

<body>
<?php use yii\widgets\ActiveForm;

$this->beginBody() ?>

<!-- Page content start  -->
<div class="page-content">

<!-- Header end -->

<!-- Main container start -->
<div class="main-container">


    <main role="main" class="flex-shrink-0">

        <?= $content ?>
    </main>




</div>
<!-- Page content end -->

</div>
<!-- Page wrapper end -->

<!--**************************
    **************************
        **************************
                    Required JavaScript Files
        **************************
    **************************
**************************-->
<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/moment.js"></script>


<!-- *************
    ************ Vendor Js Files *************
************* -->
<!-- Slimscroll JS -->
<script src="/vendor/slimscroll/slimscroll.min.js"></script>
<script src="/vendor/slimscroll/custom-scrollbar.js"></script>

<!-- Polyfill JS -->
<script src="/vendor/polyfill/polyfill.min.js"></script>
<script src="/vendor/polyfill/class-list.min.js"></script>

<!-- Apex Charts -->
<script src="/vendor/apex/apexcharts.min.js"></script>
<script src="/vendor/apex/custom/home/lineRevenueGradientGraph.js"></script>
<script src="/vendor/apex/custom/home/radialTasks.js"></script>
<script src="/vendor/apex/custom/home/lineNewCustomersGradientGraph.js"></script>

<!-- Peity Charts -->
<script src="/vendor/peity/peity.min.js"></script>
<script src="/vendor/peity/custom-peity.js"></script>

<!-- Circleful Charts -->
<script src="/vendor/circliful/circliful.min.js"></script>
<script src="/vendor/circliful/circliful.custom.js"></script>


<script src="/vendor/apex/examples/column/basic-column-graph.js"></script>
<script src="/vendor/apex/examples/column/basic-column-graph-datalables.js"></script>
<script src="/vendor/apex/examples/column/basic-column-stack-graph.js"></script>
<script src="/vendor/apex/examples/column/basic-column-stack-graph-fullheight.js"></script>

<!-- Main JS -->
<script src="/js/main.js"></script>

<?php $this->endBody() ?>
</body>
</html>