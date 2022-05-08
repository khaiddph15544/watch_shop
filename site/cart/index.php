<?php
session_start();
include_once "../../global.php";
include_once "../../dao/product.php";
include_once "../../dao/category.php";
include_once "../../dao/pdo.php";
include_once "../../dao/comment.php";
include_once "../../dao/cart.php";
include_once "../../dao/order.php";

check_login();

$main_title_sub_banner = "GIỎ HÀNG CỦA BẠN";
$sub_title = "GIỎ HÀNG";

if (isset($_REQUEST['direct']) && empty($_REQUEST['cate_id'])) {
    header('Location: ../' . $_REQUEST['direct']);
} else if (isset($_REQUEST['direct']) && isset($_REQUEST['cate_id'])) {
    header('Location: ../' . $_REQUEST['direct'] . '?cate_id=' . $_REQUEST['cate_id']);
} else if (isset($_REQUEST['direct']) && isset($_REQUEST['filter'])) {
    header('Location: ../' . $_REQUEST['direct'] . '?filter=' . $_REQUEST['filter']);
} else if (isset($_REQUEST['action'])) {
    if (isset($_REQUEST['id_pr'])) {
        header('Location: ../product/?action=' . $_REQUEST['action'] . '&id_pr=' . $_REQUEST['id_pr']);
    }
} else if (isset($_REQUEST['payment'])) {
    $main_title_sub_banner = "THANH TOÁN";
    $sub_title = "ĐƠN HÀNG";
    extract($_REQUEST);
    if (!isset($_REQUEST['buynow'])) {
        $tong_tien = (int)str_replace(".", "", $tam_tinh);
        $last_price = number_format(($tong_tien + 30000), 0, '.', '.');
    }

    if (isset($_REQUEST['order'])) {
        extract($_REQUEST);
        $conn = pdo_get_connection();
        date_default_timezone_set('ASIA/HO_CHI_MINH');
        $create_at = date('Y-m-d H:i:s');

        if (isset($_REQUEST['id_pr'])) {
            $each_price = (int)str_replace(".", "", $input_price);
            $last_price = (int)str_replace(".", "", $input_total_price);
            $last_id_insert = order_new($create_at, $_SESSION['isLogin']['user_id'], $address, $phone_number, $last_price);
            order_detail_new($last_id_insert, $id_pr, $each_price, substr($input_quantity, 1, 1), 0);
        } else {
            $last_price = (int)str_replace(".", "", $total_price);
            $last_id_insert = order_new($create_at, $_SESSION['isLogin']['user_id'], $address, $phone_number, $last_price);
            for ($i = 0; $i < count($product_id); $i++) {
                $each_price = (int)str_replace(".", "", $price[$i]);
                order_detail_new($last_id_insert, $product_id[$i], $each_price, substr($quantity[$i], 1, 1), 0);
            }
        }

        header('Location: ?order_success');
    }

    $VIEW_PAGE = "payment.php";
} else if (isset($_REQUEST['order_success'])) {
    $main_title_sub_banner = "TRẠNG THÁI ĐẶT HÀNG";
    $sub_title = "ĐẶT HÀNG";
    $VIEW_PAGE = "order_success.php";
} else if (isset($_REQUEST['order_confirm']) && isset($_REQUEST['confirm_id'])) {
    date_default_timezone_set('ASIA/HO_CHI_MINH');
    $update_at = date('Y-m-d H:i:s');
    order_update(2, $update_at, $_REQUEST['confirm_id']);
    header('Location: ?order_infor');
} else if (isset($_REQUEST['order_infor'])) {
    $main_title_sub_banner = "ĐƠN HÀNG CỦA BẠN";
    $sub_title = "ĐƠN HÀNG";

    $wait_confirm = order_check_delivery(0, $_SESSION['isLogin']['user_id']);
    $list_delivery = order_check_delivery(1, $_SESSION['isLogin']['user_id']);
    $list_deliveried = order_check_delivery(2, $_SESSION['isLogin']['user_id']);
    $list_canceled = order_check_delivery(3, $_SESSION['isLogin']['user_id']);


    if (count($wait_confirm) > 0) {
        $count_wait_confirm =  count($wait_confirm);
    } else {
        $count_wait_confirm = 0;
    }

    if (count($list_delivery) > 0) {
        $count_delivery =  count($list_delivery);
    } else {
        $count_delivery = 0;
    }

    if (count($list_deliveried) > 0) {
        $count_deliveried =  count($list_deliveried);
    } else {
        $count_deliveried = 0;
    }

    if (count($list_canceled) > 0) {
        $count_canceled =  count($list_canceled);
    } else {
        $count_canceled = 0;
    }

    for ($i = 0; $i < count($wait_confirm); $i++) {
        $list_wait_confirm[$i] = order_data_delivery($wait_confirm[$i]['order_id']);
    }
    for ($i = 0; $i < count($list_delivery); $i++) {
        $list_data_delivery[$i] = order_data_delivery($list_delivery[$i]['order_id']);
    }
    for ($i = 0; $i < count($list_deliveried); $i++) {
        $list_data_deliveried[$i] = order_data_delivery($list_deliveried[$i]['order_id']);
    }
    for ($i = 0; $i < count($list_canceled); $i++) {
        $list_data_canceled[$i] = order_data_delivery($list_canceled[$i]['order_id']);
    }

    $VIEW_PAGE = "order_infor.php";
} else if (isset($_REQUEST['cancel_order'])) {
    date_default_timezone_set('ASIA/HO_CHI_MINH');
    $update_at = date('Y-m-d H:i:s');
    order_update(3, $update_at, $_REQUEST['order_id']);
    header("Location: ?order_infor");
} else {
    $stt = 1;
    $list_cart = cart_select_all($_SESSION['isLogin']['user_id']);
    $count_cart = count($list_cart);
    if ($count_cart > 0) {
        $VIEW_PAGE = "cart.php";
    } else {
        $VIEW_PAGE = "cart_empty.php";
    }
}
include_once "../sub_banner.php";
?>

<?php require_once "../layout.php" ?>