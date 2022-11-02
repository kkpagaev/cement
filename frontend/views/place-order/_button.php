<?php

use yii\bootstrap4\Html; ?>

<!-- Row end -->
<div class="col-xl-12 col-lg-12 col-md-10 col-sm-10 col-10">

    <div class="text-center">
        <br>
        <br>
        <br>

        <?php if (!$model->isUpdate) : ?>
            <?= Html::submitButton('Створити заявку', ['class' => 'btn btn-primary']) ?>


        <?php else : ?>
            <?= Html::submitButton('Оновити заявку', ['class' => 'btn btn-primary']) ?>

        <?php endif; ?>

    </div>
</div>