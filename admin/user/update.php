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
            <label for="">Tên tài khoản</label> <input type="text" value="<?php echo $result['user_name'] ?>" name="user_name"> <br>
            <label for="">Tên đầy đủ</label> <input type="text" value="<?php echo $result['fullname'] ?>" name="fullname"> <br>
            <label for="">Email</label> <input type="text" value="<?php echo $result['email'] ?>" name="email"> <br>
            <label for="">Ảnh đại diện</label> <input type="file" name="image"> <br>
            <label for="">Tuổi</label><input type="text" value="<?php echo $result['age'] ?>" name="age"> <br>
        </div>
        <div>
            <label for="">Số điện thoại</label> <input type="text" value="<?php echo $result['phone_number'] ?>" name="phone_number"> <br>
            <label for="">Giới tính</label>  <br> <br>
            <input type="radio" name="gender" id="" value="0"> Nam
            <input type="radio" name="gender" id="" value="1"> Nữ <br> <br> <br>
            <label for="">Vai trò</label>  <br> <br>
            <input type="radio" name="role" id="" value="0"> Khách hàng
            <input type="radio" name="role" id="" value="1"> Quản trị <br> <br> <br>
            <label for="">Địa chỉ</label> <input type="text" value="<?php echo $result['address'] ?>" name="address"> <br>
        </div>
        <button name="btn_update">Cập nhật</button>
    </form>

</body>

</html>