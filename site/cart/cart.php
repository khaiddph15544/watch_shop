<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../content/css/cart.css">
</head>

<body>
    <div id="cart">
        <div class="main_cart">
            <form action="?payment" method="POST">
                <table border="1">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody id="my_tbody">
                        <?php
                        $tam_tinh = 0;
                        foreach ($list_cart as $rows) {
                            $price = $rows['price'] - ($rows['price'] * $rows['discount'] / 100);
                            $thanh_tien = $price * $rows['quantity_in_cart'];
                            $tam_tinh += $thanh_tien;
                            $tong_tien = $tam_tinh;

                        ?>
                            <tr id="row_<?php echo $rows['product_id'] ?>">
                                <input type="text" name="product_id[]" id="id_identity" value="<?php echo $rows['product_id'] ?>" hidden>
                                <td id="stt"></td>
                                <td><img src="../../admin/product/<?php echo $rows['image'] ?>" alt="" width="100"></td>
                                <td><input type="text" id="product_name" class="product_name" name="product_name[]" value="<?php echo $rows['product_name'] ?>" readonly></td>
                                <td><input type="text" id="price" name="price[]" value="<?php echo number_format($rows['price'] - ($rows['price'] * $rows['discount'] / 100), 0, '.', '.') ?> ₫" readonly></td>
                                <td>
                                    <input type="button" id="minus" value="-" onclick="quantity_minus(this)"><input type="text" name="quantity[]" value="<?php echo $rows['quantity_in_cart'] ?>" id="quantity_input" onchange="update_cart(this)"><input type="button" id="plus" value="+" onclick="quantity_plus(this)">
                                </td>
                                <td id="thanh_tien" name="thanh_tien"></td>
                                <td><i class="fas fa-trash-alt" onclick='delete_item_cart(this,<?php echo $rows["product_id"] ?>)'></i> </td>
                                <span style="visibility: hidden"><?php echo $rows['product_id'] ?></span>
                            </tr>

                        <?php $stt++;
                        } ?>

                        <span id="user_id" style="visibility: hidden"><?php echo $_SESSION['isLogin']['user_id'] ?></span>
                    </tbody>
                </table>

                <div class="order">
                    <div id="coupon">
                        <h2>Mã giảm giá</h2>
                        <input type="text" placeholder="Nhập mã giảm giá tại đây...">
                        <button>ÁP DỤNG</button>
                    </div>
                    <div class="price">
                        <h2>Tổng tiền giỏ hàng</h2>
                        <div>
                            <strong id="str1"><span>Tạm tính</span> <input type="text" id="tam_tinh" name="tam_tinh" readonly></strong>
                            <strong id="str2"><span>Tổng tiền</span> <input type="text" class="num_price2" id="tong_tien" name="tong_tien" readonly></strong>
                        </div>
                        <button type="submit" >Thanh toán</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="../../content/js/cart.js"></script>
    
</body>

</html>