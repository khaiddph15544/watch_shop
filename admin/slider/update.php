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
    <form action="" method="POST" enctype="multipart/form-data" id="func_form">
        <div>
            <label for="">Mã slider</label> <input type="text" value="Auto Number" disabled>
            <label for="">Tên slider</label> <input type="text" name="slider_name" value="<?php echo $rows['slider_name'] ?>">
            <label for="">Hình ảnh</label> <img src="value="<?php echo $rows['image'] ?>" > <input type="file" name="image" >
            <label for="">Mã hàng hóa</label> <input type="text" name="product_id" value="<?php echo $rows['product_id'] ?>">
            <button name="btn_update">Cập nhật</button>
        </div>
    </form>
</body>

</html>