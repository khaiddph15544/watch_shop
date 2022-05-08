<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đồng hồ Nam Nữ chính hãng</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../../content/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="../../content/css/responsive.css">
</head>

<body id="offset_top">
    <header>
        <!-- -------- -->
        <input type="checkbox" id="check_search" hidden>
        <label for="check_search" class="overlay_search"></label>
        <div class="form_search">
            <form action="" method="GET">
                <div class="search">
                    <i class="fas fa-search"></i>

                    <input id="input_search" type="text" autocomplete="off" name="keyword" placeholder="Nhập từ khóa tìm kiếm...">
                    <label for="check_search">
                        <i class="fas fa-times" id="close_search"></i>
                    </label>
                </div>
                <div class="list_search">

                </div>

                <ul id="top_search">
                    <span>Các từ khóa nổi bật:</span>
                    <li><i class="fas fa-search"></i><a href="#">Hublot</a></li>
                    <li><i class="fas fa-search"></i><a href="#">Rolex</a></li>
                    <li><i class="fas fa-search"></i><a href="#">Graff</a></li>
                    <li><i class="fas fa-search"></i><a href="#">Chanel</a></li>
                </ul>
            </form>
        </div>
        <!-- -------------------------- -->
        <div class="main_header">
            <div class="header_top">
                <div class="search">
                    <label for="check_search">
                        <i class="fas fa-search"></i>
                    </label>
                </div>
                <div class="logo">
                    <a href="?direct=homepage"><img src="../img/logo_duan1.png" alt="" /></a>
                </div>

                <!-- mobile -->
                <input type="checkbox" name="" id="nav_mobile" hidden>
                <label for="nav_mobile" class="overlay"> </label>
                <label for="nav_mobile" class="nav_mobile">
                    <i class="fas fa-bars"></i>
                    <span class="content"></span>
                </label>
                <div class="menu_tablet">
                    <div class="menu_tablet_title">
                        <?php echo check_status() ?>
                    </div>
                    <ul id="sub_menu">
                        <li id="all_watches"><a href="#">Đồng hồ <i class="fas fa-chevron-down"></i></a></li>
                        <ul id="sub_watches">
                            <li><a href="?direct=product&filter=men">Đồng hồ nam</a></li>
                            <li><a href="?direct=product&filter=women">Đồng hồ nữ</a></li>
                            <li id="brand_parent"><a href="#">Thương hiệu <i class="fas fa-chevron-down"></i></a></li>
                            <ul id="sub_brand">
                                <?php foreach ($list_cate as $rows) { ?>
                                    <li><a href="?direct=product&cate_id=<?php echo $rows['cate_id'] ?>"><?php echo $rows['cate_name'] ?></a></li>
                                <?php } ?>
                            </ul>

                        </ul>
                        <li><a href="">Bán chạy</a></li>
                        <li><a href="">Giảm giá sốc</a></li>
                        <li><a href="">Bảo hành</a></li>
                        <li><a href="">Về chúng tôi</a></li>
                    </ul>
                </div>
                <div class="user">
                    <input type="checkbox" id="check_user" hidden>
                    <label for="check_user">
                        <i class="far fa-user-circle"></i>
                    </label>
                    <div class="bg_user">
                        <ul class="not_login">
                            <?php echo check_status() ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="nav">
                <nav>
                    <ul class="main_father">
                        <li><a href="?direct=homepage">Trang chủ</a></li>
                        <li>
                            <a href="#new_product">Đồng hồ<i class="fas fa-angle-down"></i></a>
                            <div class="dropdown_father">
                                <div class="arrow"></div>
                                <ul>
                                    <li><a href="?direct=product&filter=men">Đồng hồ nam</a></li>
                                    <li><a href="?direct=product&filter=women">Đồng hồ nữ</a></li>
                                    <li id="sub_dropdown">
                                        <a href="">
                                            Thương hiệu<i class="fas fa-angle-right"></i>
                                        </a>
                                        <div class="dropdown_child">
                                            <div class="arrow_child"></div>
                                            <ul>
                                                <?php foreach ($list_cate as $rows) { ?>
                                                    <li><a href="?direct=product&cate_id=<?php echo $rows['cate_id'] ?>"><?php echo $rows['cate_name'] ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="#best_seller">Bán chạy</a></li>
                        <li><a href="#hot_sale">Giảm giá sốc</a></li>
                        <li><a href="?direct=warranty">Bảo hành</a></li>
                        <li><a href="#about_us">Về chúng tôi</a></li>
                    </ul>
                </nav>



            </div>
        </div>
    </header>

    <main>

        <?php require_once $VIEW_PAGE ?>
    </main>

    <footer>
        <section id="warranty">

        </section>
        <div class="footer_content">
            <div class="footer_top">
                <div class="register_email">
                    <h3>Tham gia cùng chúng tôi</h3>
                    <input type="text" placeholder="NHẬP EMAIL TẠI ĐÂY...">
                    <button>ĐĂNG KÝ</button>
                </div>
                <hr>
            </div>
            <div class="footer_bottom">
                <div class="contact">
                    <h4>LIÊN HỆ</h4>
                    <ul>
                        <li>CÔNG TY CỔ PHẦN TRỰC TUYẾN YOUTH</li>
                        <li>VPGD: 80/47 Xuân phương - Nam Từ Liêm - Hà Nội</li>
                        <li>Hotline: 1800 6005</li>
                        <li>youthwatchs@gmail.com</li>
                    </ul>
                </div>
                <div class="support">
                    <h4>HỖ TRỢ</h4>
                    <ol id="support">
                        <li><a href="">Chính sách bảo hành</a></li>
                        <li><a href="">Chính sách đổi hàng</a></li>
                        <li><a href="">Chính sách bảo mật</a></li>
                        <li><a href="">Chính sách vận chuyển</a></li>
                        <li><a href="">Hướng dẫn thanh toán</a></li>
                    </ol>
                </div>
                <div class="about_us" id="about_us">
                    <h4>VỀ CHÚNG TÔI</h4>
                    <ul>
                        <li>Với hơn 20 cửa hàng trải dài cả nước, Youth hy vọng sẽ mang đến
                            sự phục vụ chu đáo cho tất cả các khách hàng. Hệ thống cửa hàng
                            thời trang Youth luôn luôn lắng nghe những ý kiến đóng góp từ
                            các khách hàng với mục tiêu đẩy mạnh dịch vụ, mở rộng hệ thống
                            và làm hài lòng những vị khách đến trên toàn quốc.</li>
                    </ul>
                </div>
                <div class="follow_us">
                    <h4>THEO DÕI CHÚNG TÔI</h4>
                    <ul id="icon">
                        <li><a href=""><i class="fab fa-facebook"></i></a></li>
                        <li><a href=""><i class="fab fa-instagram"></i></a></li>
                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a href=""><i class="fab fa-youtube-square"></i></a></li>
                    </ul>

                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FYOUTH-100990415587834&tabs=timeline&width=340&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>
        </div>
    </footer>

    <div class="cart">
        <a href="../cart/">
            <?php
            if (isset($_SESSION['isLogin'])) {
                foreach ($list_cart as $rows) { ?>
                    <input class="cart_item" value="<?php echo $rows['product_name'] ?>" hidden>
            <?php }
            
            } ?>
            <i class="fas fa-shopping-bag"></i>
            <div class="count_cart_product">
                <span id="count_cart">
                    <?php if (isset($_SESSION['isLogin'])) {
                        echo $count_cart;
                    } else {
                        echo '0';
                    } ?></span>
            </div>
        </a>
    </div>
    <div class="chat_beside">
        <div class="back">
            <i class="fas fa-chevron-left"></i>
        </div>
        <div class="list">
            <i class="fas fa-caret-right"></i>
        </div>
    </div>
    <div class="chat">
        <label for="check_chat" class="icon_chat">
            <img src="../img/chat.png" alt="">
        </label>
        <div class="box_chat">
            <div class="header_chat">
                <h3>Chăm sóc khách hàng</h3>
                <label for="check_chat">
                    <i class="fas fa-times" id=""></i>
                </label>
            </div>

            <div class="check_session_chat">
                <?php if (!isset($_SESSION['isLogin'])) { ?>
                    <div class="not_login_chat">
                        <h4>Vui lòng đăng nhập để chat với quản trị viên!</h4>
                        <a href="?direct=account">Đăng nhập</a>
                    </div>
                <?php } else { ?>
                    <?php if ($_SESSION['isLogin']['role'] == 0) { ?>
                        <input type="text" id="session_id" value="<?php echo $_SESSION['isLogin']['user_id'] ?>" hidden>
                        <div class="message_content">

                        </div>
                        <div class="input_chat">
                            <textarea name="" id="content_message" placeholder="Gửi tin nhắn cho chúng tôi..."></textarea>
                            <div class="btn_chat">
                                <i class="fas fa-paper-plane"></i>
                            </div>
                        </div>
                    <?php } else { ?>
                        <input type="text" id="session_id" value="<?php echo $_SESSION['isLogin']['user_id'] ?>" hidden>
                        <div class="list_user">

                        </div>
                        <div class="room_chat">
                            <!-- <span id="return">Quay laji</span> -->
                            <span id="room_id_user" style="display: none"></span>
                            <div class="room_detail">
       
                            </div>
                            <div class="input_chat">
                                <textarea name="" id="content_message" placeholder="Gửi tin nhắn cho chúng tôi..."></textarea>
                                <div class="btn_chat">
                                    <i class="fas fa-paper-plane"></i>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>


    <a href="#offset_top" onclick="gototop()" title='Lên đầu trang'><img id="top" class="gototop" src='../img/back-to-top-icon.png'></a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <script src="../../content/js/validate.js"></script>

    <script type="text/javascript" src="../../content/js/common.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script src="../../content/js/detail.js"></script>

    <script src="../../content/js/chat.js"></script>

</body>

</html>