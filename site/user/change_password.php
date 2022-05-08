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
                    <form action="" method="POST" id="change_pass_form">
                        <h1>Thay đổi mật khẩu</h1>
                        <div class="password">
                            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu cũ..."> <br>
                        </div>
                        <div class="password">
                            <input type="password" id="new_password" name="new_password" placeholder="Nhập mật khẩu mới..."> <br>
                        </div>
                        <div class="password">
                            <input type="password" id="re_new_password" name="re_new_password" placeholder="Nhập lại mật khẩu..."> <br>
                        </div>
                        <div class="log_in">
                            <button name="change_password" id="change_password">Đổi mật khẩu</button>
                        </div>
                    </form>
                    <div class="forget">
                        <p><a href="?action=homepage">Trang chủ</a> / <a href="?action=manage_user">Quản lý tài khoản</a></p>
                    </div>
                </div>
            </section>

        </main>
    </div>
</body>

</html>