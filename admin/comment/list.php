<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số bình luận</th>
                <th>Mới nhất</th>
                <th>Cũ nhất</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $rows) { ?>
                <tr>
                    <td><?php echo $rows['product_name'] ?></td>
                    <td><?php echo $rows['quantity'] ?></td>
                    <td><?php echo $rows['newest_cmt'] ?></td>
                    <td><?php echo $rows['oldest_cmt'] ?></td>
                    <td><a href="?direct=cmt_detail&product_id=<?php echo $rows['product_id'] ?>">Chi Tiết</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>

