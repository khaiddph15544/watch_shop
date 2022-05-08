<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../content/css/list_product.css">
    <link rel="stylesheet" href="../../content/font-awesome/css/all.css">
</head>

<body>
    <div class="container_list_product">
        <main>
            <section class="mid">
                <div class="left">
                    <div class="filter_toggle">
                        <h3>BỘ LỌC</h3>
                    </div>
                    <aside class="filter">

                        <form action="" method="GET">
                            <h3>Khoảng Giá</h3>
                            <div class="filter_by_price">
                                <input id="min" autocomplete="off" type="number" name="min_price" placeholder="Từ">
                                <input id="max" autocomplete="off" type="number" name="max_price" placeholder="Đến">
                            </div>
                            <div class="filter">
                                <button type="button" id="bt_filter_price">ÁP DỤNG</button>
                            </div>
                            <h3>Theo thương hiệu</h3>
                            <div class="filter_by_brand">
                                <?php foreach ($brand as $rows) { ?>
                                    <div class="brand">
                                        <input type="checkbox" id="brand_<?php echo $rows["cate_id"];  ?>" value="<?php echo $rows["cate_id"];  ?>"> <?php echo $rows['cate_name'] ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <h3>Theo giới tính</h3> <br>
                            <div class="gender">
                                <input id="nam" type="checkbox" name="gender" value="0"> <span>Nam</span>
                                <input id="nu" type="checkbox" name="gender" value="1"> <span>Nữ</span>
                            </div>
                        </form>
                    </aside>
                    

                    <aside class="best_viewer">

                        <h3>Xem nhiều nhất</h3>
                        <div class="main_best_viewer">
                            <?php foreach ($top_viewer as $rows) { ?>
                                <article class="most_viewed_product">
                                    <div class="img_most_viewed_product">
                                        <a href="?action=detail&id_pr=<?php echo $rows['product_id'] ?>">
                                            <img src="../../admin/product/<?php echo $rows['image'] ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="price_most_viewed_product">
                                        <div class="product_name_most_viewed_product">
                                            <a href="?action=detail&id_pr=<?php echo $rows['product_id'] ?>"><?php echo $rows['product_name'] ?></a>
                                        </div>
                                        <div class="price">
                                            <p class="oldprice"><?php
                                                                if ($rows['discount'] > 0) {
                                                                    echo number_format($rows['price']) . " ₫";
                                                                } ?> </p>
                                            <p class="newprice"><?php echo number_format(round($rows['price'] - ($rows['price'] * $rows['discount'] / 100))) ?> ₫</p>
                                        </div>
                                        <!--  -->
                                    </div>
                                </article>
                            <?php } ?>
                        </div>
                        <!--  -->
                    </aside>
                </div>
                <div class="main_right">

                    <h1>SẢN PHẨM <span id="count_products"></span></h1>
                    <div class="right">

                        <?php foreach ($list_product as $rows) { ?>
                            <article style="position: absolute; visibility: hidden;" class="product">
                                <div class="product_img">
                                    <a href="?action=detail&id_pr=<?php echo $rows['product_id'] ?>">
                                        <img src="../../admin/product/<?php echo $rows['image'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="product_name">
                                    <p><?php echo $rows['product_name'] ?></p>
                                </div>

                                <div class="text_product">
                                    <div class="sale">

                                        <!--  -->
                                        <span class="new_price"><?php echo number_format(round($rows['price'] - ($rows['price'] * $rows['discount'] / 100))) ?> ₫</span>
                                        <span class="old_price"><?php
                                                                if ($rows['discount'] > 0) {
                                                                    echo number_format($rows['price']) . " ₫";
                                                                } ?> </span>
                                    </div>
                                    <a href="?action=detail&id_pr=<?php echo $rows['product_id'] ?>">Xem chi tiết</a>
                                </div>
                            </article>
                        <?php } ?>
                    </div>
                    <div class="pagination_product">
                        <i class='fa fa-angle-left'></i>
                        <ul></ul> <i class='fa fa-angle-right'></i>
                        <div class="goto">
                            <input id="index_page" type="text" value="1" hidden>
                        </div>
                    </div>

                    <aside class="best_viewer">

                        <h3>Xem nhiều nhất</h3>
                        <div class="main_best_viewer">
                            <?php foreach ($top_viewer as $rows) { ?>
                                <article class="most_viewed_product">
                                    <div class="img_most_viewed_product">
                                        <a href="?action=detail&id_pr=<?php echo $rows['product_id'] ?>">
                                            <img src="../../admin/product/<?php echo $rows['image'] ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="price_most_viewed_product">
                                        <div class="product_name_most_viewed_product">
                                            <a href="?action=detail&id_pr=<?php echo $rows['product_id'] ?>"><?php echo $rows['product_name'] ?></a>
                                        </div>
                                        <div class="price">
                                            <p class="oldprice"><?php
                                                                if ($rows['discount'] > 0) {
                                                                    echo number_format($rows['price']) . " ₫";
                                                                } ?> </p>
                                            <p class="newprice"><?php echo number_format(round($rows['price'] - ($rows['price'] * $rows['discount'] / 100))) ?> ₫</p>
                                        </div>
                                        <!--  -->
                                    </div>
                                </article>
                            <?php } ?>
                        </div>
                        <!--  -->
                    </aside>
                </div>
            </section>

            <p id="filter_at_home" style="display: none"><?php echo $_REQUEST['cate_id'] ?></p>
        </main>
    </div>
</body>
<script src="../../content/js/list_product.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

</html>