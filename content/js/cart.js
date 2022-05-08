var stt = 0;
var stt_text = document.querySelectorAll("#stt")

for (var i = 0; i < stt_text.length; i++) {
    stt++
    stt_text[i].innerHTML = stt
}

function delete_item_cart(offset, product_id) {
    $.ajax({
        url: "../../site/action.php",
        type: "POST",
        data: {
            product_id: product_id,
            delete_item_cart: ""
        },
        success: function (data) {
            var i = offset.parentNode.parentNode.rowIndex;
            document.getElementById("my_tbody").deleteRow(i - 1)

            var stt = 0;
            var stt_text = document.querySelectorAll("#stt")

            for (var i = 0; i < stt_text.length; i++) {
                stt++
                stt_text[i].innerHTML = stt
            }
            if($("#my_tbody tr").length == 0){
                location.reload()
            }
            tinh_tien()
        }
    })

}

function tinh_tien() {
    var list_price = document.querySelectorAll("#price")
    var arr_price = new Array()
    var quantity_input = document.querySelectorAll("#quantity_input")

    for (var i = 0; i < list_price.length; i++) {
        arr_price.push(list_price[i].value.replace(/[^0-9]/g, '') * quantity_input[i].value)
    }

    var list_thanh_tien = document.querySelectorAll("#thanh_tien")
    var tam_tinh = 0;
    for (var i = 0; i < list_thanh_tien.length; i++) {
        $(list_thanh_tien[i]).text(arr_price[i].toLocaleString().replaceAll(',', '.') + ' ₫')
        tam_tinh = (tam_tinh + arr_price[i])
    }
    $("#tam_tinh").val(tam_tinh.toLocaleString().replaceAll(',', '.') + ' ₫')

    var tong_tien = tam_tinh

    $("#tong_tien").val(tong_tien.toLocaleString().replaceAll(',', '.') + ' ₫')
}
tinh_tien()


// js nút cộng trừ số lượng 
var list_current_quantity = document.querySelectorAll("#quantity_input")

var list_plus = document.querySelectorAll("#plus")

var list_minus = document.querySelectorAll("#minus")


function quantity_plus(offset) {
    var current_value = offset.parentNode.querySelector("#quantity_input").value
    var parse_value = Number(current_value)

    offset.parentNode.querySelector("#quantity_input").value = parse_value + 1

    if(offset.parentNode.querySelector("#quantity_input").value > 99 ){
        offset.parentNode.querySelector("#quantity_input").value = 99
    }
    tinh_tien()
    update_cart(offset)
}

function quantity_minus(offset) {
    var current_value = offset.parentNode.querySelector("#quantity_input").value
    var parse_value = Number(current_value)

    offset.parentNode.querySelector("#quantity_input").value = parse_value - 1

    if(offset.parentNode.querySelector("#quantity_input").value < 1 ){
        offset.parentNode.querySelector("#quantity_input").value = 1
    }
    tinh_tien()
    update_cart(offset)
}

function update_cart(offset){

    var quantity = offset.parentNode.querySelector("#quantity_input").value
    var user_id = $("#user_id").text()
    var product_id = (offset.parentNode.parentNode.id).slice(4)
    $.ajax({
        url: "../../site/action.php",
        type: "POST",
        data: {
            quantity: quantity,
            user_id: user_id,
            product_id: product_id,
            update_cart: ""
        },
        success: function(data){
            console.log(data)
        }
    })
}

