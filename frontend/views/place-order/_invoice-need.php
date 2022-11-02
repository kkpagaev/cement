<!-- Row end -->
<br>
<div class="col-xl-12 col-lg-12 col-md-10 col-sm-10 col-10">
    <div class="text-center">
        <div class="card-title">
            Чи потрібен Вам буде рахунок на предоплату?
        </div>
    </div>
    <br>
    <div class="text-center">
        <div class="custom-control custom-checkbox">
            <input type="hidden" name="Order[invoice_needed]" value="<?= $model->order->invoice_needed ?>"><input type="checkbox" id="order-invoice_needed" class="custom-control-input" name="Order[invoice_needed]" value="1">
            <label class="custom-control-label" for="order-invoice_needed">Так</label>
        </div>
    </div>
</div>