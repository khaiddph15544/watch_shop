<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../content/css/order.css">
</head>

<body>
    <h2><?php echo $notice ?></h2>
    <form action="" method="POST">
        <table>
            <thead>
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Giảm giá</th>
                    <th>Thành tiền</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sum = 30000;
                    foreach ($result as $rows) { 
                    
                    $tam_tinh = $rows['price'] * $rows['quantity'];
                    $thanh_tien = round($tam_tinh - ($tam_tinh * $rows['discount'] / 100));
                    $sum+= $thanh_tien;
                    $last_price = number_format($thanh_tien)." đ";
                    ?>

                    <tr>
                        <td><?php echo $rows['product_id'] ?></td>
                        <td><img src="../product/<?php echo $rows['image'] ?>"></td>
                        <td><?php echo $rows['product_name'] ?></td>
                        <td><?php echo $rows['quantity'] ?></td>
                        <td><?php echo number_format($rows['price'])." đ" ?></td>
                        <td><?php echo $rows['discount'] ?> %</td>
                        <td><?php echo $last_price ?></td>
                        <td></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div id="page">
            <h3>Tổng tiền: <?php echo number_format($sum) ?> đ</h3>
        </div>
    </form>
</body>

</html>