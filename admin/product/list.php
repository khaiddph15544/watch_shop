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
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Hình ảnh</th>
                    <th>Giảm giá</th>
                    <th>Đối tượng</th>
                    <th>Trạng thái</th>
                    <th>Tên loại</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $rows) { ?>
                    <tr>
                        <td><input type="checkbox" name="remove[]" value="<?php echo $rows['product_id'] ?>"></td>
                        <td><?php echo $rows['product_name'] ?></td>
                        <td><?php echo $rows['price'] ?></td>
                        <td><img src="<?php echo $rows['image'] ?>" alt="" width="100"></td>
                        <td><?php echo $rows['discount'] ?></td>
                        <td><?php echo $rows['model'] ?></td>
                        <td><?php echo $rows['status'] ?></td>
                        <td><?php echo $rows['cate_name'] ?></td>
                        <td><a href="?direct=update&update_id=<?php echo $rows['product_id'] ?>"><i class="fas fa-edit"></i></a> |
                            <a onclick="return confirm('Bạn có muốn xóa không?')" href="?delId=<?php echo $rows['product_id'] ?>"><i class="fas fa-trash-alt"></i></a>
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
            if($current_page > 2){
                echo "<a href='?page=1'> Đầu </a>";
            }
            if($current_page > 1){
                $pre_page = $current_page - 1;
                echo "<a href='?page=$pre_page'> Trước </a>";
            }
            ?>
            <?php for ($i = 1; $i <= $count_page; $i++) { 
                if($current_page != $i){
                    if($i > $current_page -3 && $i < $current_page +3){
                        echo "<a href='?page=$i'> $i </a>";
                    }
                }else{
                    echo"<strong><a href='' id='btn_current_page'>$i</a></strong>";
                }
            }
            ?>
            <?php 
            if($current_page < $count_page){
                $next_page = $current_page +1;
                echo "<a href='?page=$next_page'> Sau </a>";
            }
            if($current_page  < $count_page - 1){
                echo "<a href='?page=$count_page'> Cuối </a>";
            }
                
            ?>
        </div>
    </form>
</body>

</html>