<?php
session_start();
include_once "../dao/common.php";
include_once "../dao/user.php";
include_once "../dao/product.php";
include_once "../dao/comment.php";
include_once "../dao/cart.php";
include_once "../dao/chat.php";

if (isset($_REQUEST["search"])) {
    $list_search = search($_REQUEST["search"]);
    foreach ($list_search as $row) {
?>
        <div class="card">
            <a href="?action=detail&id_pr=<?php echo $row['product_id'] ?>">
                <div class="img">
                    <img src="../../admin/product/<?php echo $row["image"]; ?>" alt="">
                </div>
                <div class="txt">
                    <p><?php echo $row["product_name"]; ?></p>
                    <div class="price">
                        <span id="old">
                            <?php
                            if ($row['discount'] > 0) {
                                echo number_format($row["price"], 0, '.', '.') . "đ";
                            }
                            ?>
                        </span>
                        <span id="new">
                            <?php
                            $precent = (100 - $row["discount"]) / 100;
                            $new_price = $row["price"] * $precent;
                            echo number_format($new_price, 0, '.', '.');
                            ?>
                            đ
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <?php
    }
}

if (isset($_REQUEST['find_pass'])) {
    extract($_REQUEST);

    $user = find_password($email, $user_name);
    if (!$user) {
        echo "Thông tin không chính xác!";
    } else {
        echo "Đang chuyển hướng...";
    }
}

if (isset($_REQUEST['reset_pass'])) {
    extract($_REQUEST);
    $password_endcode = md5($password);
    $check_reset = reset_password($password_endcode, $email);
    echo "Cập nhật mật khẩu thành công!";
}

if (isset($_REQUEST['register_account'])) {
    extract($_REQUEST);
    date_default_timezone_set('ASIA/HO_CHI_MINH');
    $create_at = date('Y-m-d H:i:s');
    if (!user_exists($email)) {
        $password_endcode = md5($password);
        user_new($user_name, $email, $password_endcode, "", "avatar/default.jpg", $age, "", 0, 0, "", $create_at);
        echo "Tạo tài khoản thành công!";
    } else {
        echo "Email mã được đăng kí!";
    }
}

if (isset($_REQUEST['login_account'])) {
    extract($_REQUEST);

    $password_endcode = md5($password);
    $data_user = check_user_to_login($email, $password_endcode);

    if (!$data_user) {
        echo "Email hoặc mật khẩu không chính xác!";
    } else {
        if ($_REQUEST['remember'] != "") {
            setcookie("email", $email, time() + 3600);
            setcookie("password", $password, time() + 3600);
        } else {
            setcookie("email", "", time() - 3600);
            setcookie("password", "", time() - 3600);
        }
        $_SESSION['isLogin'] = $data_user;
        echo "Đăng nhập thành công!";
    }
}

if (isset($_REQUEST['change_password'])) {
    extract($_REQUEST);

    $email = $_SESSION['isLogin']['email'];

    $password_endcode = md5($password);
    $new_password_endcode = md5($new_password);
    if ($password_endcode == $_SESSION['isLogin']['password']) {
        change_password($new_password_endcode, $email);
        echo "Thay đổi mật khẩu thành công!";
        $user_infor_new = user_select_one($_SESSION['isLogin']['user_id']);
        $_SESSION['isLogin'] = $user_infor_new;
    } else {
        echo "Mật khẩu cũ không chính xác!";
    }
}

if (isset($_REQUEST['exe_cmt'])) {
    extract($_REQUEST);
    date_default_timezone_set('ASIA/HO_CHI_MINH');
    $create_at = date('Y-m-d H:i:s');
    if (isset($_SESSION['isLogin'])) {
        if ($content == "") {
            echo "Bạn phải nhập nội dung bình luận";
        } else if (strlen($content) <= 6) {
            echo "Nội dung bình luận phải lớn hơn 6 kí tự!";
        } else {
            comment_new($content, $create_at, $_SESSION['isLogin']['user_id'], $product_id);
            echo "Thành công!";
        }
    } else {
        echo "Bạn chưa đăng nhập!";
    }
}

if (isset($_REQUEST['addtocart'])) {
    extract($_REQUEST);

    $check_product_exist = cart_exist_product($user_id, $product_id);

    if (!$check_product_exist) {
        add_to_cart($user_id, $product_id, $price, $quantity);
    } else {
        add_exist_item_cart($quantity, $user_id, $product_id);
    }
    var_dump($check_product_exist);
}



if (isset($_REQUEST['delete_item_cart'])) {
    extract($_REQUEST);

    cart_delete($product_id);
}

if (isset($_REQUEST['update_cart'])) {
    extract($_REQUEST);
    cart_update($quantity, $user_id, $product_id);
}

if (isset($_REQUEST['update_account'])) {
    echo "Cập nhật thông tin thành công!";
}




if (isset($_REQUEST["list_brand"]) or isset($_REQUEST['number_gender']) or isset($_REQUEST['filter_price'])) {
    $sql_where = '';
    $list_brand = '';
    $gender = '';
    $i = 0;
    $min =  $_REQUEST['filter_price']['min'];
    $max =  $_REQUEST['filter_price']['max'];
    if (isset($_REQUEST["list_brand"])) {
        if (count($_REQUEST["list_brand"]) >= 1) {
            if (isset($_REQUEST['number_gender']) && count($_REQUEST['number_gender']) == 1) {
                while ($i <= count($_REQUEST["list_brand"]) - 1) {
                    $brand[$i] = 'model = ' . $_REQUEST['number_gender'][0] . ' and cate_id = ' . $_REQUEST["list_brand"][$i] . ' or ';
                    $list_brand = $list_brand . $brand[$i];
                    $i++;
                }
            } else {
                while ($i <= count($_REQUEST["list_brand"]) - 1) {
                    $brand[$i] = ' cate_id = ' . $_REQUEST["list_brand"][$i] . ' or ';
                    $list_brand = $list_brand . $brand[$i];
                    $i++;
                }
            }
        }
    }
    if (isset($_REQUEST['number_gender']) && !isset($_REQUEST["list_brand"])) {
        if ($_REQUEST['number_gender'] != '') {
            $gender = ' model= ' . $_REQUEST['number_gender'][0] . ' and';
        }
    }
    $sql_where = "SELECT * FROM products WHERE " . $gender . $list_brand;

    if (isset($_REQUEST["list_brand"]) && count($_REQUEST["list_brand"]) >= 1) {
        if ($min != '' && $max != '') {
            $sql_where = str_replace('or', ' and products.price between ' . $min . ' and ' . $max . ' or', $sql_where);
        } elseif ($max != '' && $min == '') {
            $sql_where = str_replace('or', ' and products.price < ' . $max . ' or', $sql_where);
        } elseif ($max == '' && $min != '') {
            $sql_where = str_replace('or', ' and products.price > ' . $min . ' or', $sql_where);
        }
    } else {
        if ($min != '' && $max != '') {
            $sql_where = str_replace('and', ' and products.price between ' . $min . ' and ' . $max . ' or', $sql_where);
        } elseif ($max != '' && $min == '') {
            $sql_where = str_replace('and', ' and products.price < ' . $max . ' or', $sql_where);
        } elseif ($max == '' && $min != '') {
            $sql_where = str_replace('and', ' and products.price > ' . $min . ' or', $sql_where);
        }
    }
    if (isset($_REQUEST["filter_price"]) && !isset($_REQUEST["list_brand"]) && !isset($_REQUEST['number_gender'])) {
        if ($min != '' && $max != '') {
            $sql_where = str_replace('WHERE', ' WHERE products.price between ' . $min . ' and ' . $max . ' or', $sql_where);
        } elseif ($max != '' && $min == '') {
            $sql_where = str_replace('WHERE', ' WHERE products.price < ' . $max . ' or', $sql_where);
        } elseif ($max == '' && $min != '') {
            $sql_where = str_replace('WHERE', ' WHERE products.price > ' . $min . ' or', $sql_where);
        } else {
            $sql_where = substr($sql_where, 0, strlen($sql_where) - 3);
        }
    }

    $sql_where = substr($sql_where, 0, strlen($sql_where) - 3);

    $result = pdo_query($sql_where);
    if (count($result) > 0) {
        foreach ($result as $rows) {
        ?>
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
                        <span class="old_price">
                            <?php
                            if ($rows['discount'] > 0) {
                                echo number_format($rows['price']) . " ₫";
                            } ?>
                        </span>
                    </div>
                    <a href="?action=detail&id_pr=<?php echo $rows['product_id'] ?>">Xem chi tiết</a>
                </div>
            </article>

        <?php
        }
    } else {
        echo "<h1>Không tìm thấy sản phẩm nào</h1>";
    }
}
function get_message_time($message_time)
{
    date_default_timezone_set('ASIA/HO_CHI_MINH');
    $get_time = date('Y-m-d H:i:s');
    $current_time = strtotime($get_time);

    $comment_time = strtotime($message_time);

    $get_exact_time = abs($current_time - $comment_time);

    if ($get_exact_time < 60) { // < 60s
        $show_time = "vừa xong";
    } else if ($get_exact_time < 60 * 60) {   // từ 1p -> 1h (60s - 3600s)
        $minutes = floor($get_exact_time / 60);
        $show_time = "$minutes phút trước";
    } else if ($get_exact_time < 60 * 60 * 24) { // từ 1h - 24h (3600s - 86400s)
        $hours = floor($get_exact_time / (60 * 60));
        $show_time = "$hours giờ trước";
    } else if ($get_exact_time < 60 * 60 * 24 * 7) { // từ 1d - 7d (86400s - 604.800s)
        $days = floor($get_exact_time / (60 * 60 * 24));
        $show_time = "$days ngày trước";
    } else if ($get_exact_time < 60 * 60 * 24 * 7 * 4) { // từ 7d - 30d 
        $weeks = floor($get_exact_time / (60 * 60 * 24 * 7));
        $show_time = "$weeks tuần trước";
    } else if ($get_exact_time < 60 * 60 * 24 * 7 * 4 * 12) { // từ 30d - 1y 
        $months = floor($get_exact_time / (60 * 60 * 24 * 7 * 4));
        $show_time = "$months tháng trước";
    } else { // > 1y
        $years = floor($get_exact_time / (60 * 60 * 24 * 7 * 4 * 12));
        $show_time = "$years năm trước";
    }
    return $show_time;
}

if (isset($_REQUEST['exe_message'])) {
    extract($_REQUEST);
    date_default_timezone_set('ASIA/HO_CHI_MINH');
    $create_at = date('Y-m-d H:i:s');
    if ($recipient_id == 0) {
        $recipient_id = null;
    }
    $last_id_insert = message_new($sender_id, $recipient_id);

    message_content_new($last_id_insert, $content, $create_at, 0);
}


if (isset($_REQUEST['chat_room'])) {
    extract($_REQUEST);

    $result = chat_select_by_user($user_id, $user_id);
    foreach ($result as $rows) {

        if ($rows['recipient_id'] == null || $rows['recipient_id'] == 0) { ?>
            <div class="message_group">
                <div class="message_left">
                    <span class="text_message"><?php echo $rows['content'] ?></span>
                    <span class='time_message'><?php echo get_message_time($rows['create_at']) ?></span>
                </div>
            </div>
        <?php } else { ?>
            <div class="message_group">
                <div class="message_right">
                    <span class="text_message"><?php echo $rows['content'] ?></span>
                    <span class='time_message'><?php echo get_message_time($rows['create_at']) ?></span>
                </div>
            </div>
        <?php }
    }
}

if (isset($_REQUEST['show_list_user'])) {

    $list_chat = chat_select_all();

    foreach ($list_chat as $rows) {  ?>

        <div class="box_user" id="beside_<?php echo $rows['user_id'] ?>" onclick="chat_room(<?php echo $rows['user_id'] ?>)">
            <span style="display: none;" id="all_message"><?php echo select_count_by_user($rows['user_id'], $rows['user_id'])['all_rows'] ?></span>
            <div class="avatar_user">
                <img src="../../admin/user/<?php echo $rows['avatar'] ?>" alt="">
            </div>
            <div class="box_user_right">
                <span id="name"><?php echo $rows['user_name'] ?></span> <br>
                <span class="text_last">
                    <?php
                    $text = chat_select_last($rows['user_id'], $rows['user_id'])['content'];
                    if (strlen($text) > 15) {
                        echo substr($text, 0, 15) . '...';
                    } else {
                        echo $text;
                    }
                    ?></span>
                <span id="time"> <span class="dot"> • </span><?php echo get_message_time(chat_select_last($rows['user_id'], $rows['user_id'])['create_at']); ?></span>
            </div>
        </div>
<?php

    }
}
?>