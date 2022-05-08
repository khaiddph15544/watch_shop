var product_id = localStorage.getItem("product_id")
var name = localStorage.getItem("name")
var quantity = localStorage.getItem("quantity")
var price = localStorage.getItem("price")


$("#id_pr").val(product_id)
$(".input_name").val(name)
$(".input_quantity").val("x" + quantity)
$(".input_price").val(price + " ₫")
$(".input_tam_tinh").val((price.replaceAll(".", "") * quantity).toLocaleString().replaceAll(",", ".") + " ₫")
$(".input_total_price").val((price.replaceAll(".", "") * quantity + 30000).toLocaleString().replaceAll(",", ".") + " ₫")