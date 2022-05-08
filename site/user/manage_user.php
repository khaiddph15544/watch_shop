<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta id="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../content/css/manage_user.css">
</head>
<body>
    <div class="personal_infor">
        <h2>Thông tin cá nhân</h2>

        <form action="" method="POST" enctype="multipart/form-data" id="main_personal_infor">
            <div class="img_pi">
                <img src="../../admin/user/<?php echo $_SESSION['isLogin']['avatar'] ?>" alt="" width="300">
                <input id='fileid' type='file' name="image" hidden>
                <input type="button" value="Chọn ảnh đại diện" id="upload_img">
                <h5 id="show_img_name" style="color: green;"></h5>
                <span id="show_name_img"></span>
            </div>
            <div class="content_pi">
                <p id="showStatus"><?php echo $showErr; ?></p>
                <span id="name">Tên đăng nhập</span> <input type="text" id="user_name" name="user_name" value="<?php echo $_SESSION['isLogin']["user_name"] ?>">     
                <span>Họ và tên</span> <input type="text" id="fullname" name="fullname" value="<?php echo $_SESSION['isLogin']['fullname'] ?>"> 
                <span>Email</span> <input type="text" id="email" name="email" value="<?php echo $_SESSION['isLogin']['email'] ?>" disabled> 
                <span>Số điện thoại</span> <input type="text" id="phone_number" name="phone_number" value="<?php echo $_SESSION['isLogin']['phone_number'] ?>"> 
                <span>Địa chỉ</span> <input type="text" id="address" name="address" value="<?php echo $_SESSION['isLogin']['address'] ?>"> 
                <span>Tuổi</span> <input type="text" id="age" name="age" value="<?php echo $_SESSION['isLogin']['age'] ?>"> 
                <span>Giới tính</span> 
                <select name="gender" id="gender">
                    <option value="<?php echo $value_gender[0] ?>"><?php echo $gender; ?></option>
                    <option value="<?php echo $value_gender[1] ?>"><?php echo $next_gender; ?></option>
                </select> 
                <button name="update_user">Cập nhật</button>
            </div>
        </form>
    </div>

</body>
</html>