<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <table>
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Tên người dùng</th>
                    <th>Số lượng sản phẩm</th>
                    <th>Tổng tiền giỏ hàng</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $rows) { ?>
                    <tr>
                        <td><?php echo $stt ?></td> 
                        <td><?php echo $rows['user_name'] ?></td>
                        <td><?php echo $rows['quantity_in_cart'] ?></td>
                        <td><?php echo number_format($rows['total_price'], 0, '.', '.'). " ₫" ?></td>
                        <td><a href="?direct=cart_detail&user_id=<?php echo $rows['user_id'] ?>">Xem chi tiết</a>
                        </td>
                    </tr>
                <?php $stt++; } ?>
            </tbody>
        </table>

    </form>
</body>

</html>