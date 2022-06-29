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
    <title><?= yii\helpers\Html::encode($this->title) ?></title>


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
$notifications = \common\models\one_c\Notification::find()->where(['user_id' => Yii::$app->user->identity->c1_id])->all();
$has_unread_notifications = \common\models\one_c\Notification::find()->where(['user_id' => Yii::$app->user->identity->c1_id, 'is_read' => 0])->exists();

$this->beginBody() ?>
<input id="user_id" type="hidden" value="<?= Yii::$app->user->identity->c1_id ?>">
<!-- Page content start  -->
<div class="page-content">

    <header class="header">
        <div class="toggle-btns">

            <div class="logo">
                <a href="/"><img src="/img/Безымянный-1.png" alt="Logo"></a>
            </div>

        </div>

        <!-- Header actions start -->
        <ul class="header-actions">
            <li><a href="<?=  \yii\helpers\Url::to(['/']); ?>">Головна</a></li>

            <li><a href="#">Звіти</a></li>

            <li><a href="#">Функції</a></li>

            <li class="dropdown d-none d-sm-block">

                <a href="#" id="notifications" data-toggle="dopdown" aria-haspopup="true">

                </a>

                <div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">




                    <div class="dropdown-menu-header">
                        Events (10)
                    </div>


                    <ul class="header-notifications">




                    </ul>
                </div>
            </li>
            <li class="dropdown d-none d-sm-block">
                <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                    <i class="icon-phone"></i>
                    <span class="count-label blue"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
                    <div class="dropdown-menu-header">
                        Зворотній зв'язок
                    </div>
                    <div class="customScroll5">
                        <ul class="bookmarks p-3">
                            <li>
                                <a href="#">Персональний менеджер <br> 067-7103445<br>anton@krcement.com</a>
                            </li>
                            <li>
                                <a href="#">Торговий представник <br> 067-3245565<br>dmytro@krcement.com</a>
                            </li>
                            <li>
                                <a href="#">Гаряча лінія<br>0800-2344334</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown d-none d-sm-block" id="notification_drop">
                <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                    <i class="icon-bell"></i>
                    <?php if($has_unread_notifications) {
                        echo '<span class="count-label"></span>';
                    } ?>

                </a>
                <div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
                    <div class="dropdown-menu-header">
                        Інформаційні статуси (10)
                    </div>
                    <ul class="header-notifications" id="header-notifications">
                        <?php foreach($notifications as $notification): ?>
                        <li is_read="<?= $notification->is_read ?>" id="<?= $notification->c1_id ?>" >
                            <a href="#">
                                <div class="user-img away">
                                    <img src="/img/user2.png" alt="User">
                                </div>
                                <div class="details">
                                    <div class="user-title"><?= $notification->title ?></div>
                                    <div class="noti-details"><?= $notification->description ?></div>
                                    <div class="noti-date"><?= $notification->timestamp ?> </div>
                                </div>
                            </a>
                        </li>
                        <?php endforeach;?>


                    </ul>
                </div>
            </li>
            <li class="dropdown user-settings">
                <a href="#" id="userSettings" data-toggle="dropdown" aria-haspopup="true">
                    <img src="/img/user2.png" class="user-avatar" alt="Avatar">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                    <div class="header-profile-actions">
                        <div class="header-user-profile">
                            <div class="header-user">
                                <img src="/img/user2.png" alt="Admin Template">
                            </div>
                            <h5><?= Yii::$app->user->identity->first_name ?></h5>
                            <p></p>
                        </div>
                        <a href="#"><i class="icon-user1"></i><font color="#000000">Профіль</font></a>
                        <a href="#"><i class="icon-settings1"></i><font color="#000000">Налаштування</font></a>
                        <?php $form = ActiveForm::begin(['action' =>['/site/logout'], 'id' => 'logout_id', 'method' => 'post',]); ?>

                        <a href="javascript:$('#logout_id').submit();"><i class="icon-log-out1"></i><font color="#000000">Вийти</font></a>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </li>
        </ul>
        <!-- Header actions end -->
        <div class="dropdown-menu dropdown-menu-left lrg">

            <li><a href="" class="current">Work</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Blog</a></li>
            <li><a href="">Contact</a></li>
            </ul>
        </div>
</div>
</header>
<!-- Header end -->
<div class="container">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>
</div>
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