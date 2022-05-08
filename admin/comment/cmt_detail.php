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
                    <th><i class="fas fa-check-square"></i></th>
                    <th>Nội dung</th>
                    <th>Ngày bình luận</th>
                    <th>Người bình luân</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $rows) { ?>
                    <tr id="row_<?php echo $rows['comment_id'] ?>">
                        <td><input type="checkbox" name="remove[]" value="<?php echo $rows['comment_id'] ?>"></td>
                        <td><?php echo $rows['content'] ?></td>
                        <td><?php echo $rows['create_at'] ?></td>
                        <td><?php echo $rows['fullname'] ?></td>
                        <td><span style="cursor:pointer;" onclick="delete_cmt(<?php echo $rows['comment_id'] ?>)"><i class="fas fa-trash-alt"></i></span>
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