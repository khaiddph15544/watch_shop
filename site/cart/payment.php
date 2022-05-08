<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../content/css/payment.css">
</head>

<body>
    <form action="" method="POST" id="infor_user">
        <div class="container_payment">
            <div class="infor_user">
                <h2>Thông tin thanh toán</h2>
                <input type="text" name="fullname" placeholder="Nhập họ và tên...">
                <input type="text" value="Địa chỉ: <?php echo $_SESSION['isLogin']['address'] ?>" readonly>
                <input type="text" value="Email: <?php echo $_SESSION['isLogin']['email'] ?>" readonly>
                <input type="text" name="address" placeholder="Địa chỉ nhận hàng...">
                <input type="text" name="phone_number" placeholder="Số điện thoại...">
                <select name="payment_method" id="">
                    <option value="">Phương thức thanh toán</option>
                    <option value="1">Thanh toán khi nhận hàng</option>
                </select>
            </div>
            <div class="infor_order">
                <h2>Hóa đơn</h2>
                <div>
                    <span>Sản phẩm</span> <span>Đơn giá</span>
                </div>
                <?php if (!isset($_REQUEST['buynow'])) { ?>
                    <?php for ($i = 0; $i < count($_REQUEST['product_name']); $i++) {  ?>
                        <input type="text" name="product_id[]" value=<?php echo $product_id[$i] ?> hidden>
                        <div>
                            <input type="text" class="input_val" name="product_name[]" value="<?php echo $product_name[$i] ?>" readonly> <input type="text" class="input_val_after" name="quantity[]" value="<?php echo "x" . $quantity[$i] ?>" readonly> <input type="text" class="input_val_after after_price" name="price[]" value="<?php echo $price[$i] ?>" readonly>
                        </div>
                    <?php } ?>

                    <div>
                        <span>Tạm tính</span> <input type="text" class="input_val_price" id="cost" name="tam_tinh" value="<?php echo $tam_tinh ?>" readonly>
                    </div>
                    <div>
                        <span>Phí vận chuyển (toàn quốc)</span> <span>30.000 ₫</span>
                    </div>
                    <div>
                        <span>Tổng tiền</span> <input type="text" class="input_val_price" id="cost" name="total_price" value="<?php echo $last_price ?> ₫" readonly>
                    </div>
                <?php } else { ?>
                    <input type="text" id="id_pr" name="id_pr" value="" hidden>
                    <div>
                        <input type="text" class="input_name" value="" readonly> <input type="text" class="input_quantity" name="input_quantity" value="" readonly> <input type="text" class="input_price" name="input_price" value="" readonly>
                    </div>
                    <div>
                        <span>Tạm tính</span> <input type="text" class="input_tam_tinh" id="cost" name="tam_tinh" value="" readonly>
                    </div>
                    <div>
                        <span>Phí vận chuyển (toàn quốc)</span> <span>30.000 ₫</span>
                    </div>
                    <div>
                        <span>Tổng tiền</span> <input type="text" class="input_total_price" id="cost" name="input_total_price" value="" readonly>
                    </div>
                <?php } ?>
                <button name="order">ĐẶT HÀNG</button>
            </div>
        </div>
    </form>

    <script src="../../content/js/validate.js"></script>

    <script src="../../content/js/buynow.js"></script>
</body>

</html>