<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../content/css/warranty.css">
</head>

<body>
    <div class="infor_warranty">
        <img src="./img/warranty_logo.png" alt="">
        <h1>THÔNG TIN SẢN PHẨM BẢO HÀNH</h1>
        <hr>

        <div class="main_iw">
            <table border="1">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Ngày lên đơn</th>
                        <th>Lý do bảo hành</th>
                        <th>Trạng thái</th>
                        <th>Mã bảo hành</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_warranty as $rows) {
                        if ($rows['status'] == 0) {
                            $status = "Đang chờ bảo hành";
                            $action = "<a onclick='return confirm(" . '"Sản phẩm đã nhận được bảo hành?"' . ")' href='?confirm_warranty&confirm_id=" . $rows["warranty_id"] . "' > Xác nhận bảo hành</a>";
                        } else {
                            $status = "Đã bảo hành";
                            $action = '<a href="?action=detail&id_pr=' . $rows['product_id'] . '"> Xem chi tiết</a>';
                        }
                    ?>
                        <tr>
                            <td><img src="../../admin/product/<?php echo $rows['image'] ?>" alt="" width="150"></td>
                            <td><?php echo $rows['product_name'] ?></td>
                            <td><?php echo $rows['create_at'] ?></td>
                            <td><?php echo $rows['reason'] ?></td>
                            <td><?php echo $status ?></td>
                            <td><?php echo $rows['warranty_id'] ?></td>
                            <td><?= $action ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="create_warranty">
            <a href="?register_warranty">ĐĂNG KÝ BẢO HÀNH</a>
        </div>
    </div>
</body>

</html>