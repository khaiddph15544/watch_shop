<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2><?php echo $notice; ?></h2>
    <form action="" method="POST">
        <table>
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $rows) { ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $rows['product_name'] ?></td>
                        <td><?php echo number_format($rows['price'], 0, '.', '.'). " ₫" ?></td>
                        <td><?php echo $rows['quantity'] ?></td>
                        </td>
                    </tr>
                <?php $stt++;} ?>
            </tbody>
        </table>
    </form>
</body>

</html>