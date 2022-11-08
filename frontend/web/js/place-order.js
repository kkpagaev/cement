function filShippingAddresses(shipping_address) {
    let select = $("#order-shipping_address_id");
    select.empty();
    Object.keys(shipping_address).forEach((key) => {
        select.append(new Option(shipping_address[key], key));
    })
}

function removerOrderItem(id) {
    $("#order-item-" + id).remove();
}

function template(id, hasDate, hasTime, isWagon) {
    let result = `
<div class="collapse show" aria-labelledby="withIconOne" data-parent="#withIconsAccordion"  id="order-item-${id}">
                                    <div class="accordion-body">
    <div class="row gutters">
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

function fillShippingAddress(contractId, pickup_address_id) {
    let delivery_type = $("#delivery_type").val();
    $.get("/place-order/get-shipping?contract_id=" + contractId + "&delivery_type=" + delivery_type + "&pickup_address_id="+pickup_address_id, function (data) {
        filShippingAddresses(data);
    });
}

$("#contract_id").on('change', function () {
    let contractId = this.value;
    let pickup_address_id = $("#order-pickup_address_id").val();
    if (pickup_address_id) {
        fillShippingAddress(contractId, pickup_address_id);
        fillProducts(contractId, pickup_address_id);
    }
    // fillPickupAddresses(contractId);
});

$("#order-pickup_address_id").on('change', function () {

    let contractId = $("#contract_id").val();
    let pickup_address_id = this.value;

    if(contractId){
        fillShippingAddress(contractId, pickup_address_id);

        fillProducts(contractId, pickup_address_id);
    }
}
);
// $("#order-shipping_address_id").on('change', function () {
//     let ship_id = this.value;
//     let contract_id = $("#contract_id").val();
//     fillProducts(contract_id, ship_id);
// });

// if ($("#contract_id").val()) {
//     fillShippingAddress($("#contract_id").val());
// }


function fillProducts(contractId, pickup_address_id) {
    $.get("/place-order/get-products?contract_id=" + contractId + "&pickup_address_id=" + pickup_address_id, function (data) {
        fillProductsSelect(data);
    });
}

function fillProductsSelect(data) {
    $('.product_id').each(function () {
        let select = $(this);
        select.empty();
        console.log(data);
        Object.keys(data).forEach((key) => {
            console.log(key);
            console.log(data[key].title);
            select.append(new Option(data[key].title, data[key].c1_id));
        })
    })

}

// function fillPickupAddresses(contract_id) {
//     $.get("/place-order/get-pickup-addresses?contract_id=" + contract_id, function (data) {
//         fillPickupAddressesSelect(data);
//     });

// }

function fillPickupAddressesSelect(data) {

    $('#order-shipping_address_id').empty();
    console.log(data);
    Object.keys(data).forEach((key) => {
        $('#order-shipping_address_id').append(new Option(data[key].address, key));

    })
}
$(document).on('click', '.product_id', function () {
    console.log('123');
});