function filShippingAddresses(shipping_address) {
    let select = $("#order-shipping_address_id");
    select.empty();
    console.log(shipping_address);
    Object.keys(shipping_address).forEach((key) => {
        console.log(key);
        select.append(new Option(shipping_address[key], key));
    })
}

function removerOrderItem(id) {
    $("#order-item-" + id).remove();
}

function template(id, hasDate, hasTime, isWagon) {
    let result = `
<div id="collapseWithIconOne" class="collapse show" aria-labelledby="withIconOne" data-parent="#withIconsAccordion">
                                    <div class="accordion-body">
    <div class="row gutters" id="order-item-${id}">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
            <div class="form-group field-order_item_${id}_product_id required">
                <select id="order_item_${id}_product_id" class="form-control" name="Item[${id}][product_id]" aria-required="true">
                
                </select>
                <div class="help-block"></div>
            </div>                                       
        </div>
        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
            <div class="form-group">
                <div class="form-group field-order_item_${id}_weight required">
                    <input type="number" id="order_item_${id}_weight" class="form-control" name="Item[${id}][weight]" placeholder="Вага" aria-required="true">
                    <div class="help-block"></div>
                </div>                                       
            </div>
        </div>
    `
    if (hasDate) {
        result += `  
        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
            <div class="form-group">
                <div class="form-group field-order_item_${id}_order_date">
    
                    <input type="date" id="order_item_${id}_order_date" class="form-control" name="Item[${id}][order_date]" placeholder="Дата">
    
                    <div class="help-block"></div>
                </div>
            </div>
        </div>
        `
    }
    if (hasTime) {
        result += `  
        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 col-3">
            <div class="form-group">
                <div class="form-group">
                    <div class="form-group field-order_item_${id}_order_time">
                        <input type="time" id="order_item_${id}_order_time" class="form-control" name="Item[${id}][order_time]" placeholder="Час">
                        <div class="help-block"></div>
                    </div>                                                
                 </div>
            </div>
        </div>
        `
    }
    if (isWagon) {
        result += `  
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
            <div class="form-group form-group field-order_item_${id}_wagon_type_id required">
                <select id="order_item_${id}_wagon_type_id" class="form-control" name="Item[${id}][wagon_type_id]" aria-required="true">
                    
                </select>
                <div class="help-block"></div>
            </div>
        </div>
        `
    }
    result += `
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">

        <button class="btn btn-danger" type="button" onclick="removerOrderItem(${id})">Прибрати</button>
        </div>
    </div></div>
        </div>`;

    return result;
}

function orderItemsCount() {
    return $("#order-items").children().length;
}

function addOrderItem() {
    let delivery_type = $("#delivery_type").val();
    let id = orderItemsCount();
    if (delivery_type == 0) {
        $("#order-items").append(template(id, true, true, false));
        $('#order_item_' + id + '_product_id').html($('#order_item_0_product_id').html());
    } else if (delivery_type == 1) {
        $("#order-items").append(template(id, false, false, true));
        $('#order_item_' + id + '_product_id').html($('#order_item_0_product_id').html());
        $('#order_item_' + id + '_wagon_type_id').html($('#order_item_0_wagon_type_id').html());

    } else {
        $("#order-items").append(template(id, true, false, false));
        $('#order_item_' + id + '_product_id').html($('#order_item_0_product_id').html());
    }

}

function fillShippingAddress(contractId) {
    let delivery_type = $("#delivery_type").val();
    $.get("/place-order/get-shipping?contract_id=" + contractId + "&delivery_type=" + delivery_type, function (data) {
        filShippingAddresses(data);
    });
}

$("#contract_id").on('change', function () {
    let contractId = this.value;
    fillShippingAddress(contractId);
});
if ($("#contract_id").val()) {
    fillShippingAddress($("#contract_id").val());
}