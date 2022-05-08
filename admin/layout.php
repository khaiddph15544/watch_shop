<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../content/css/home.css">
    <link rel="stylesheet" href="../content/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="../content/css/responsive.css">

</head>

<body>
    <div class="container">
        <div class="main_right">
            <header>
                <!-- mobile -->
                <div class="nav_mobile">
                    <i class="fas fa-bars"></i>
                    <div class="content"></div>
                </div>
                <!-- -------- -->
                <div class="main_header">
                    <div class="header_top">
                        <div class="search">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="logo">
                            <a href=""><img src="../img/logo_duan1.png" alt="" /></a>
                        </div>
                        <div class="user">
                            <input type="checkbox" id="check_user" hidden>
                            <label for="check_user">
                                <i class="far fa-user-circle"></i>
                            </label>
                            <div class="bg_user">
                                <ul class="not_login">
                                    <?php echo check_session() ?>
                                </ul>
                            </div>
                        </div>
                    </div>

            </header>
            <main>
                <?php
                require_once $VIEW_PAGE;
                ?>
            </main>
        </div>

        <div class="home">
            <div class="sidebar">
                <div class="title">
                    <h2>Admin</h2>
                </div>
                <nav>
                    <ul>
                        <a href="?controller=home">
                            <li><i class="fas fa-caret-right"></i>Trang chủ</li>
                        </a>
                        <a href="?controller=category">
                            <li id="category"><i class="fas fa-caret-right"></i>Loại hàng</li>
                        </a>
                        <a href="?controller=product">
                            <li id="product"><i class="fas fa-caret-right"></i>Hàng hóa</li>
                        </a>
                        <a href="?controller=user">
                            <li id="user"><i class="fas fa-caret-right"></i>Người dùng</li>
                        </a>
                        <a href="?controller=comment">
                            <li id="comment"><i class="fas fa-caret-right"></i>Bình luận</li>
                        </a>
                        <a href="?controller=order">
                            <li id="order"><i class="fas fa-caret-right"></i>Đơn hàng</li>
                        </a>
                        <a href="?controller=warranty">
                            <li id="warranty"><i class="fas fa-caret-right"></i>Bảo hành</li>
                        </a>
                        <a href="?controller=cart">
                            <li id="cart"><i class="fas fa-caret-right"></i>Giỏ hàng</li>
                        </a>
                        <a href="?controller=slider">
                            <li id="slider"><i class="fas fa-caret-right"></i>Slider</li>
                        </a>
                        <a href="?controller=general">
                            <li id="general"><i class="fas fa-caret-right"></i>Thống kê</li>
                        </a>
                    </ul>
                </nav>
            </div>

        </div>
    </div>


    <div class="gototop">
        <a href="javascript:;" id="gototop" onclick="gototop()"><img src="./img/back-to-top-icon.png" alt=""></a>
    </div>

    <script src="../content/js/common.js"></script>
    <script src="../content/js/ajax/user.js"></script>
</body>

</html>