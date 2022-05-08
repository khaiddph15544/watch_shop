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
                    <form action="" method="POST" id="login_form">
                        <h1>Đăng nhập</h1>
                        <div class="account">
                            <input type="text" id="email" name="email" placeholder="Nhập email của bạn..."> <br>
                        </div>
                        <div class="password">
                            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu..."> <br>
                        </div>
                        <div class="remember">
                            <input type="checkbox" name="remember" id="remember"> Ghi nhớ <br>
                        </div>
                        <div class="log_in">
                            <button name="login">Đăng nhập</button>
                        </div>
                    </form>
                    <div class="forget">
                        <p><a href="?action=register">Đăng ký</a> / <a href="?action=forgot">Quên mật khẩu</a></p>
                    </div>
                </div>
            </section>

        </main>
    </div>
</body>

</html>