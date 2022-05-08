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
                    <th>Mã bảo hành</th>
                    <th>Tên khách hàng</th>
                    <th>Tên sản phẩm</th>
                    <th>Ngày đăng ký bảo hành</th>
                    <th>Tình trạng sản phẩm</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $rows) { ?>
                    <tr>
                        <td><?php echo $rows['warranty_id'] ?></td>
                        <td><?php echo $rows['user_id'] ?></td>
                        <td><?php echo $rows['product_id'] ?></td>
                        <td><?php echo $rows['create_at'] ?></td>
                        <td><?php echo $rows['reason'] ?></td>
                        <td><?php echo $rows['phone_number'] ?></td>
                        <td><?php echo $rows['address'] ?></td>
                        <td><?php echo $rows['status'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div id="page">
            <?php if ($count_page > 1) { ?>
                <?php for ($i = 1; $i <= $count_page; $i++) { ?>
                    <?php if ($current_page != $i) { ?>
                        <a href="?page=<?= $i ?>"><?= $i ?></a>
                    <?php } else { ?>
                        <strong><a href="" id="btn_current_page"><?= $i ?></a></strong>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>
    </form>
</body>

</html>