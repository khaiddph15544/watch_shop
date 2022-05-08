<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p id="showErr"><?php echo $showErr; ?></p>
    <form action="" method="POST" id="func_form">
        <div>
            
            <label for="">Tên loại</label> <input type="text" name="cate_name" value="<?php echo $rows['cate_name'] ?>">
            <button name="btn_update">Cập nhật</button>
        </div>
    </form>
</body>

</html>