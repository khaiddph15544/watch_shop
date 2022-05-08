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
                    <th>Email</th>
                    <th>Ảnh đại diện</th>
                    <th>Giới tính</th>
                    <th>Tuổi</th>
                    <th>Đăng ký ngày</th>
                    <th>vai trò</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $rows) { ?>
                    <tr id="row_<?php echo $rows['user_id'] ?>">
                        <td><input type="checkbox" name="remove[]" value="<?php echo $rows['user_id'] ?>"></td>
                        <td><?php echo $rows['email'] ?></td>
                        <td><img src="<?php echo $rows['avatar'] ?>" alt=""></td>
                        <td><?php echo $rows['gender'] ?></td>
                        <td><?php echo $rows['age'] ?></td>
                        <td><?php echo $rows['create_at'] ?></td>
                        <td><?php echo $rows['role'] ?></td>
                        <td><a href="?direct=update&update_id=<?php echo $rows['user_id'] ?>"><i class="fas fa-edit"></i></a> |
                            <span style="cursor:pointer;" onclick="delete_user(<?php echo $rows['user_id'] ?>)"><i class="fas fa-trash-alt"></i></span>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <input type="button" value="Chọn tất cả" id="select_all">
        <input type="button" value="Bỏ chọn tất cả" id="unselect_all">
        <input type="submit" value="Xóa tất cả mục đã chọn" id="remove_all" name="remove_all">

        <div id="page">
            <?php
            if ($count_page > 2) {
                if ($current_page > 2) {
                    echo "<a href='?page=1'> Đầu </a>";
                }

                if ($current_page > 1) {
                    $pre_page = $current_page - 1;
                    echo "<a href='?page=$pre_page'> Trước </a>";
                }
            }

            ?>
            <?php for ($i = 1; $i <= $count_page; $i++) {
                if ($current_page != $i) {
                    if ($i > $current_page - 3 && $i < $current_page + 3) {
                        echo "<a href='?page=$i'> $i </a>";
                    }
                } else {
                    echo "<strong><a href='' id='btn_current_page'>$i</a></strong>";
                }
            }
            ?>
            <?php
            if ($count_page > 2) {
                if ($current_page < $count_page) {
                    $next_page = $current_page + 1;
                    echo "<a href='?page=$next_page'> Sau </a>";
                }
                if ($current_page  < $count_page - 1) {
                    echo "<a href='?page=$count_page'> Cuối </a>";
                }
            }

            ?>
        </div>
    </form>
</body>

</html>