<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../content/css/account_common.css">
    <link rel="stylesheet" href="../../content/css/login.css">
</head>

<body>
    <div class="container_login">
        <main>
            <section>
                <div class="model_img">
                    <img src="../img/unnamed.jpg" alt="">
                    <div class="notice">
                        <label for="" class="error" id="resultErr"></label>
                        <i class="fas fa-exclamation-circle"></i>
                        <i class="far fa-check-circle"></i>
                    </div>
                </div>
                <!--  -->
                <div class="Content">
                    <form action="" method="POST" id="forgot_form">
                        <h1>Lấy lại mật khẩu</h1>
                        <div class="account">
                            <input type="text" id="email" name="email" placeholder="Nhập email..."> <br>
                        </div>
                        <div class="user_name">
                            <input type="text" id="user_name" name="user_name" placeholder="Nhập tên tài khoản..."> <br>
                        </div>
                        <div class="log_in">
                            <button name="find_password" id="find_password">Tìm mật khẩu</button>
                        </div>
                    </form>
                    <div class="forget">
                        <p><a href="?action=login">Đăng nhập</a> / <a href="?action=register">Đăng ký</a></p>
                    </div>
                </div>
            </section>

        </main>
    </div>
</body>

</html>