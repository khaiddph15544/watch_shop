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
                    <th>Tên loại</th>
                    <th>Số lượng</th>
                    <th>Giá cao nhất</th>
                    <th>Giá thấp nhất</th>
                    <th>Giá trung bình</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $rows) { ?>
                    <tr>
                        <td><?php echo $rows['cate_name'] ?></td>
                        <td><?php echo $rows['quantity']?></td>
                        <td><?php echo number_format(round($rows['max_price'])) ?> ₫</td>
                        <td><?php echo number_format(round($rows['min_price'])) ?> ₫</td>
                        <td><?php echo number_format(round($rows['avg_price'])) ?> ₫</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <input type="submit" name="chart" value="Xem biểu đồ"> 
    </form>

    
</body>

</html>