<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="main">
        <div class="top">
            <nav>
                <ul>
                    <li> <i class="fas fa-layer-group"></i> <?php echo $cate_count ?> Loại hàng</li>
                    <li> <i class="fas fa-box"></i><?php echo $product_count ?> hàng hóa</li>
                    <li> <i class="fas fa-user"></i><?php echo $user_count ?> Người dùng</li>
                    <li> <i class="fas fa-comment-alt"></i><?php echo $comment_count ?> Bình luận</li>
                    <li> <i class="fas fa-clipboard-list"></i><?php echo $order_count ?> Đơn hàng</li>
                </ul>
            </nav>
        </div>
    </div>
    <br>
    <br>
    <div class="chart">
        <?php require_once "chart.php" ?>
    </div>
    <div class="list_new_user">
        <div class="title">
            <h2>Thành viên mới</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <td>Stt</td>
                    <td>Người dùng</td>
                    <td>Email</td>
                    <td>Tuổi</td>
                    <td style="width: 25%;">Thời gian đăng ký</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($top5 as $rows) { ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $rows['user_name'] ?></td>
                        <td><?php echo $rows['email'] ?></td>
                        <td><?php echo $rows['age'] ?></td>
                        <td><?php echo $rows['create_at'] ?></td>
                    </tr>
                <?php $stt++; } ?>
            </tbody>
        </table>
    </div>
</body>

</html>