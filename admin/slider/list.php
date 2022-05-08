<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="?direct=add" id="add">Thêm mới</a>
    <form action="" method="POST">
        <table>
            <thead>
                <tr>
                    <th><i class="fas fa-check-square"></i></th>
                    <th>Tên slider</th>
                    <th>Hình ảnh</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th>Mã hàng hóa</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $rows) { ?>
                    <tr>
                        <td><input type="checkbox" name="remove[]" value="<?php echo $rows['slider_id'] ?>"></td>
                        <td><?php echo $rows['slider_name'] ?></td>
                        <td><img src="<?php echo $rows['image'] ?>" alt="" width="150" ></td>
                        <td><?php echo $rows['create_at'] ?></td>
                        <td><?php echo $rows['update_at'] ?></td>
                        <td><?php echo $rows['product_id'] ?></td>
                        <td><a href="?direct=update&update_id=<?php echo $rows['slider_id'] ?>"><i class="fas fa-edit"></i></a> |
                            <a onclick="return confirm('Bạn có muốn xóa không?')" href="?delId=<?php echo $rows['slider_id'] ?>"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <input type="button" value="Chọn tất cả" id="select_all">
        <input type="button" value="Bỏ chọn tất cả" id="unselect_all">
        <input type="submit" value="Xóa tất cả mục đã chọn" id="remove_all" name="remove_all">

    </form>
</body>

</html>