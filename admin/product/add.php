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
            <label for="">Tên hàng hóa</label> <input type="text" name="product_name"> <br>
            <label for="">Đơn giá</label> <input type="text" name="price"> <br>
            <label for="">Hình ảnh</label> <input type="file" name="image"> <br>
            <label for="">Giảm giá</label> <input type="text" name="discount"> <br>
            <label for="">Số lượng</label> <input type="text" name="quantity"> <br>
        </div>
        <div>
            <label for="">Trạng thái</label> <input type="text" name="status"> <br>
            <label for="">Tên loại</label> <br>
            <select name="cate_id" id="">
                <?php foreach ($result as $rows) { ?>
                    <option value="<?php echo $rows['cate_id'] ?>"><?php echo $rows['cate_name'] ?></option>
                <?php } ?>
            </select> <br>
            <label for="">Đối tượng</label> <br> <br>
            <input type="radio" name="model"> Nam
            <input type="radio" name="model"> Nữ <br> <br>
            <label for="">Mô tả</label> <br> <br>
            <textarea name="description" id="" cols="30" rows="10"></textarea> <br>
        </div>

        <button name="btn_add">Thêm mới</button>
    </form>
</body>

</html>