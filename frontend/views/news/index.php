<?php
/* @var $this yii\web\View */
?>

    <!-- Page header start -->
    <div class="page-header">

        <!-- Breadcrumb start -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Новини</li>
        </ol>
        <!-- Breadcrumb end -->


    </div>
    <!-- Page header end -->

    <!-- Row start -->
    <?php for($row = 0; $row < count($news)/3; $row++):?>
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card-deck">
                    <?php for($i = 0; $i < 3; $i++):?>
                    <?php
                        $index = $i + $row * 3;
                        if(isset($news[$index])):
                            $post = $news[$index];
                        ?>
                            <div class="card">
                                <img class="card-img-top" src="img/user1.png" alt="Card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $post->title?></h5>
                                    <p class="card-text"><?= $post->description?></p>
                                    <p class="card-text"><small class="text-muted"><?= $post->timestamp ?></small></p>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="card" style="background: #f5f6fa;">
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>


                </div>
            </div>
        </div>
    <?php endfor; ?>
    <!-- Row end -->



