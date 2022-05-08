<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="../../content/css/home.css">
    <link rel="stylesheet" href="../../content/css/responsive_home.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="../../content/slick-1.8.1/slick/slick.css">
    <script src="../../content/slick-1.8.1/slick/slick.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="slider">
        <?php foreach ($result as $rows) { ?>
            <div class="main">
                <div class="txt">
                    <h2><?php echo str_replace(explode(" ", $rows['slider_name'])[0], explode(" ", $rows['slider_name'])[0] . "<br>", $rows['slider_name'])  ?></h2>
                    <span>Sự kết hợp hoàn hoảo giữa thiết kế và chức năng</span> <br>
                    <a href="?action=detail&id_pr=<?php echo $rows['product_id'] ?>"><button>XEM THÊM</button></a>
                </div>
                <img class="image" src="../../admin/slider/<?php echo $rows['image'] ?>" alt="">
            </div>
        <?php } ?>

        <i onclick="plusSlides(-1)" class="fas fa-chevron-left"></i>
        <i onclick="plusSlides(1)" class="fas fa-chevron-right"></i>
        <div class="dotbox">
            <div class="dot" onclick="currentSlide(1)"></div>
            <div class="dot" onclick="currentSlide(2)"></div>
            <div class="dot" onclick="currentSlide(3)"></div>
        </div>
    </div>
    <div class="gender">
        <div class="men_watch">
            <a href="?direct=product&filter=men">
                <h2>FOR <br> MEN</h2>
                <img src="../homepage/img/gender_men.png" alt="">
            </a>
        </div>
        <div class="women_watch">
            <a href="?direct=product&filter=women">
                <h2>FOR <br> WOMEN</h2>
                <img src="../homepage/img/gender_women.png" alt="">
            </a>
        </div>
    </div>
    <div class="new_product" id="new_product">
        <div class="title">
            <p>PHONG CÁCH MỚI</p>
            <h2>SẢN PHẨM <br> MỚI</h2>
            <span>Những mẫu mới nhất, bộ sưu tập hoàn hảo <br> dành cho bạn</span>
            <div class="bt">
                <a href="">
                    <a href="?direct=product"><span>Xem tất cả</span> </a>
                </a>
            </div>
        </div>
        <div class="list_product">
            <?php foreach ($new_product as $rows) { ?>
                <div class="card" data-aos="fade-up" data-aos-offset="100" data-aos-delay="<?php echo $duration; ?>" data-aos-duration="1000">
                    <a href="?action=detail&id_pr=<?php echo $rows['product_id'] ?>">
                        <span id="new">NEW</span>
                        <div class="img">
                            <img src="../../admin/product/<?php echo $rows['image'] ?>" alt="">
                        </div>
                    </a>
                    <div class="txt">
                        <p><?php echo $rows['product_name'] ?></p>
                        <div class="price_bt">
                            <span><?php echo number_format(round($rows['price'])) ?> ₫</span>
                            <a href="?action=detail&id_pr=<?php echo $rows['product_id'] ?>">
                                <button>MUA NGAY</button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php $duration += 100;
            } ?>
        </div>
    </div>
    <div class="best_seller" id="best_seller">
        <div class="title">
            <p>Bán chạy nhất</p>
            <h2>BEST SELLER</h2>
        </div>
        <div class="main_seller">
            <div class="slider_seller">
                <?php foreach ($row_left as $rows) { ?>
                    <div class="card">
                        <a href="?action=detail&id_pr=<?php echo $rows['product_id'] ?>">
                            <div class="img">
                                <img src="../../admin/product/<?php echo $rows['image'] ?>" alt="">
                            </div>
                        </a>
                        <div class="txt">
                            <p><?php echo $rows['product_name'] ?></p>
                            <div class="price_bt">
                                <div class="price">
                                    <span><?php echo number_format($rows['price']) ?> ₫</span>
                                </div>
                                <a href="?action=detail&id_pr=<?php echo $rows['product_id'] ?>">
                                    <button>MUA NGAY</button>
                                </a>
                            </div>
                        </div>

                    </div>
                <?php } ?>
            </div>
            <div class="list_seller">
                <?php foreach ($row_right as $rows) { ?>
                    <div class="card">

                        <a href="?action=detail&id_pr=<?php echo $rows['product_id'] ?>">
                            <?php if ($rows['discount'] > 0) { ?>
                                <span id="sale">-<?php echo $rows['discount'] ?> %</span>
                            <?php }else{ ?>
                                <span id="sale">HOT</span>
                                <?php } ?>
                            <img src="../../admin/product/<?php echo $rows['image'] ?>" alt="">
                        </a>

                        <div class="txt">
                            <p><?php echo $rows['product_name'] ?></p>
                            <div class="price_bt">
                                <div class="price">
                                    <?php if ($rows['discount'] > 0) { ?>
                                        <span id="old"><?php echo number_format($rows['price']) ?> ₫</span> <br>
                                    <?php } ?>
                                    <span id='new'><?php echo number_format(round($rows['price'] - ($rows['price'] * $rows['discount'] / 100))) ?> ₫</span>
                                </div>
                                <a href="?action=detail&id_pr=<?php echo $rows['product_id'] ?>">
                                    <button>MUA NGAY</button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="all_sale" id="hot_sale">
        <div class="title">
            <p>Giảm giá tốt nhất</p>
            <h2>HOT SALES</h2>
        </div>
        <div class="slider_sale">
            <?php foreach ($hot_sales as $rows) { ?>
                <div class="card">
                    <a href="?action=detail&id_pr=<?php echo $rows['product_id'] ?>">
                        <span class="sale"><?php echo -$rows['discount'] ?>%</span>
                        <div class="img">
                            <img src="../../admin/product/<?php echo $rows['image'] ?>" alt="">
                        </div>
                    </a>
                    <div class="txt">
                        <p><?php echo $rows['product_name'] ?></p>
                        <div class="price_bt">
                            <div class="price">
                                <span class="old"><?php echo number_format($rows['price']) ?> ₫</span> <br>
                                <span class="new"><?php echo number_format(round($rows['price'] - ($rows['price'] * $rows['discount'] / 100))) ?> ₫</span>
                            </div>
                            <a href="?action=detail&id_pr=<?php echo $rows['product_id'] ?>">
                                <button>MUA NGAY</button>
                            </a>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>
    <div class="man_post" id="product">
        <div class="img">
            <div class="bg"></div>
            <img data-aos="fade-right" data-aos-offset="100" data-aos-delay="50" data-aos-duration="1000" src="../homepage/img/man_post.png" alt="">
        </div>
        <div class="txt">
            <h2 data-aos="fade-left" data-aos-offset="100" data-aos-delay="50" data-aos-duration="1000">Men's Watches</h2>
            <p data-aos="fade-left" data-aos-offset="100" data-aos-delay="150" data-aos-duration="1000">Đồng hồ tượng trưng cho sự thành thành đạt và tinh tế. <br>
                Sự tự tin trên cổ tay của người đàn ông hiện đại</p>
            <a href="?direct=product&filter=men"> <span>Xem tất cả</span></a>
        </div>
    </div>
    <div class="women_post">
        <div class="txt">
            <h2 data-aos="fade-right" data-aos-offset="100" data-aos-delay="50" data-aos-duration="1000">Women's Watches</h2>
            <p data-aos="fade-right" data-aos-offset="100" data-aos-delay="150" data-aos-duration="1000">Trang sức nói lên <br>
                cá tính của người phụ nữ hiện đại</p>
            <a href="?direct=product&filter=women"> <span>Xem tất cả</span></a>
        </div>
        <div class="img">
            <div class="bg"></div>
            <img data-aos="fade-left" data-aos-offset="100" data-aos-delay="150" data-aos-duration="1000" id="women_post1" src="../homepage/img/women_post1.png" alt="">
            <img data-aos="fade-left" data-aos-offset="100" data-aos-delay="250" data-aos-duration="800" id="women_post2" src="../homepage/img/women_post2.png" alt="">
        </div>
    </div>
    <div class="insta" id="contact_us">
        <div class="title">
            <h2>Instagram</h2>
        </div>
        <div class="list_img">
            <img src="../homepage/img/imstagram_1.png" alt="">
            <img src="../homepage/img/imstagram_2.png" alt="">
            <img src="../homepage/img/imstagram_3.png" alt="">
            <img src="../homepage/img/imstagram_4.png" alt="">
            <img src="../homepage/img/imstagram_5.png" alt="">
            <img src="../homepage/img/imstagram_6.png" alt="">
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
<script src="../../content/js/home.js"></script>