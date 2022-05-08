<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../content/css/detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container_detail">
        <div class="main_content">
            <div class="img">
                <img src="../../admin/product/<?php echo $product_detail['image'] ?>" alt="">
            </div>


            <div class="content">
                <h2 name="product_name" id="name_pr"><?php echo $product_detail['product_name'] ?></h2> <br>
                <span id="status">Trạng thái: <span>
                        <?php if ($product_detail['quantity'] > 0) {
                            echo "Còn hàng";
                        } else {
                            echo "Hết hàng";
                        } ?>
                    </span></span> <br>
                <hr style="color: #fff;">
                <span id="price">Giá: <span id="new_cost"><?php
                                                            $precent = (100 - $product_detail["discount"]) / 100;
                                                            $new_price = $product_detail["price"] * $precent;
                                                            echo number_format($new_price, 0, '.', '.'). " đ";
                                                            ?>
                    </span> <del id="old_cost"><?php if ($product_detail['discount'] > 0) echo number_format($product_detail["price"], 0, '.', '.') . "đ"; ?></del>
                </span>
                <span id="model">Dành cho đối tượng:
                    <?php if ($product_detail['model'] == 0) {
                        echo "Nam";
                    } else {
                        echo "Nữ";
                    }  ?></span> <br>
                <span>Thương hiệu: <?php echo $product_detail['cate_name'] ?></span> <br>
                <span>Phí vận chuyển: </span> <span id="ship">30.000 đ</span> <br>
                <span>Số lượng <input type="button" id="minus_detail" value="-"><input type="button" id="quantity_detail"><input type="button" id="plus_detail" value="+"> </span>

                <div class="btn">
                    <button id="addtocart" onclick='add_to_cart(<?php echo $user_id ?>, <?php echo $_REQUEST["id_pr"] ?>)'>Thêm vào giỏ hàng</button>
                    <button id="buy_now">Mua ngay</button>
                </div>
                <span id="check_session_js" hidden><?php echo $status_session ?></span>
            </div>

        </div>
        <div class="sub_detail">

            <div class="description">
                <h3 id="desc">Mô tả: </h3>
                <span id="desc_text"><?php echo $product_detail['description'] ?></span>
            </div>

            <div class="comment">
                <div class="main_comment">
                    <h3>Bình luận về <?php echo $product_detail['product_name'] ?></h3>
                    <form action="" method="POST" id="comment_form">
                        <span id="cmt_error"></span>
                        <div class="cmt_input">
                            <input type="text" name="cmt_content" id="cmt_content" placeholder="Để lại bình luận tại đầy...">
                        </div>
                        <button type="button" id="execute_comment">Gửi bình luận</button>
                    </form>

                    <h3>Bình luận (<span id="count_comment"></span>)</h3>

                    <?php foreach ($comment_detail as $rows) { ?>
                        <div class="cmt_detail">
                            <div class="cmt_detail_img">
                                <img src="../../admin/user/<?php echo $rows['avatar'] ?>" alt="">
                            </div>
                            <div class="cmt_detail_infor">
                                <div class="cmt_detail_infor_top">
                                    <strong><?php echo $rows['user_name'] ?></strong>
                                    <span> - <?php echo get_comment_time($rows['comment_time']) ?></span>
                                </div>
                                <p><?php echo $rows['content'] ?></p>

                                <hr>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="pagination_cmt">
                        <i class='fa fa-angle-left'></i>
                        <ul></ul>
                        <i class='fa fa-angle-right'></i>

                        <input id="index_page_cmt" type="text" value="1" hidden>
                    </div>

                </div>
            </div>
        </div>
        <div class="product_involve">
            <div class="title">
                <h2>Sản phẩm tương tự</h2>
            </div>
            <div class="list_involve">
                <?php foreach ($product_involve as $rows) { ?>
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
                                    <span class="old">
                                        <?php
                                        if ($rows['discount'] > 0) {
                                            echo number_format($rows["price"], 0, '.', '.') . "đ";
                                        }
                                        ?>
                                    </span>
                                    <span class="new" id="new_price">
                                        <?php
                                        $precent = (100 - $rows["discount"]) / 100;
                                        $new_price = $rows["price"] * $precent;
                                        echo number_format($new_price, 0, '.', '.'). " đ";
                                        
                                        ?>
                                    </span>

                                </div>
                                <div class="bt">
                                    <button>MUA NGAY</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>