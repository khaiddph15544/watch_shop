<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../content/css/account_common.css">
    <link rel="stylesheet" href="../../content/css/register.css">
</head>

<body>
    <div class="main_register">
        <main>
            <section>
                <div class="model_img">
                    <img src="../img/Screenshot_2.png" alt="">
                    <div class="notice">
                        <label for="" class="error" id="resultErr"></label>
                        <i class="fas fa-exclamation-circle"></i>
                        <i class="far fa-check-circle"></i>
                    </div>
                </div>
                <!--  -->
                <div class="content">
                    <h1>ĐĂNG KÝ</h1>
                    <form action="" method="POST" id="register_form">

                        <div class="account">
                            <input type="text" id="user_name" name="user_name" placeholder="Nhập tài khoản"> <br>
                        </div>
                        <div class="password">
                            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu"> <br>
                        </div>
                        <div class="confirm_password">
                            <input type="password" id="re_password" name="re_password" placeholder="Xác nhận mật khẩu"> <br>
                        </div>
                        <div class="email_age">
                            <input class="email" id="email" name="email" type="text" placeholder=" Nhập Email">
                            <input class="age" id="age" name="age" type="text" placeholder="Nhập tuổi">
                        </div>
                        <div class="register">
                            <button name="register">Đăng ký</button>
                        </div>
                    </form>
                    <div class="forget">
                        <p><a href="?action=login">Đăng nhập</a> / <a href="?action=forgot">Quên mật khẩu</a></p>
                    </div>
                </div>
            </section>

        </main>
    </div>
</body>

</html>