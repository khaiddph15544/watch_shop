<?php
include_once "../../dao/pdo.php";
include_once "../../dao/cart.php";
include_once "../../dao/category.php";
include_once "../../dao/order.php";

if (isset($_SESSION['isLogin'])) {
    $list_cart = cart_select_all($_SESSION['isLogin']['user_id']);
    $count_cart = count($list_cart);
}

function count_order()
{
    if (isset($_SESSION['isLogin'])) {
        $count_order = count(order_check_delivery(0, $_SESSION['isLogin']['user_id']));
    }
    return $count_order;
}

function check_login()
{
    if (session_id() == "") {
        session_start();
    }
    if (!isset($_SESSION['isLogin'])) {
        header('Location: ../account/');
    }
}
function check_session()
{
    if (session_id() == "") {
        session_start();
    }
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        session_destroy();
        header('Location: ../account/');
    }

    if ($_SESSION['isLogin']['role'] != 1) {
        header('Location: ../../site/account');
    } else {
        $show_admin = "
        <li><a href='#' id='hello_user'>Xin chào: " . $_SESSION['isLogin']['fullname'] . "</a></li>
            <li><a href='../../site/user?manage_user'>Quản lí tài khoản</a></li>
            <li><a href='../../site/user?change_password'>Đổi mật khẩu</a></li>
            <li><a href='../../site/cart?order_infor'>Quản lí đơn hàng (" . count_order() . ") </a></li>
            <li><a href='../../site'>Người dùng cuối</a></li>
            <li><a href='?action=logout'>Đăng xuất</a></li>
        ";
    }
    return $show_admin;
}

function check_status()
{
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        session_destroy();
        header('Location: ../account/');
    }

    if (isset($_SESSION['isLogin'])) {
        if ($_SESSION['isLogin']['role'] == 1) {
            $show = "
                        <div>
                            <li><a href='#' id='hello_user'>Xin chào: " . $_SESSION['isLogin']['fullname'] . "</a></li>
                        </div>
                        <div id='user_action'>
                            <li><a href='../user?manage_user'>Quản lí tài khoản</a></li>
                            <li><a href='../user?change_password'>Đổi mật khẩu</a></li>
                            <li><a href='../cart?order_infor'>Quản lí đơn hàng (" . count_order() . ") </a></li>
                            <li><a href='../../admin'>Trang chủ quản trị</a></li>
                            <li><a href='?action=logout'>Đăng xuất</a></li>
                        </div>
                    ";
        } else {
            $show = "
                        <div>
                            <li><a href='#' id='hello_user'>Xin chào: " . $_SESSION['isLogin']['fullname'] . "</a></li>
                        </div>
                        <div id='user_action'>
                            <li><a href='../user?manage_user'>Quản lí tài khoản</a></li>
                            <li><a href='../user?change_password'>Đổi mật khẩu</a></li>
                            <li><a href='../cart?order_infor'>Quản lí đơn hàng (" . count_order() . ") </a></li>
                            <li><a href='?action=logout'>Đăng xuất</a></li>
                        </div>
                    ";
        }
    } else {
        $show = "<li><a id='hello_user' href='?direct=account'>Đăng nhập / Đăng ký</a></li>";
    }

    return $show;
}

function upload_image($pathImg)
{
    $showErr = "";
    $result = "";
    $allowFile = array("jpg", "png", "gif");
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $pathNow = $_FILES['image']['tmp_name'];

    //Check sự hợp lệ của loại file tải lên
    if (!in_array($fileType, $allowFile)) {
        $showErr = 'Chỉ được phép tải lên file có dạng png, jpg hoặc gif';
    } elseif ($fileSize > 2000000) {
        $showErr = "File ảnh không được vượt quá 2MB";
    } else {
        $result = $pathImg . $fileName;
        move_uploaded_file($pathNow, $result);
    }
    return array($result, $showErr);
}

function pagination($count_record, $limit_record, $table_name, $where)
{
    $count_page = ceil($count_record / $limit_record);

    if (isset($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }
    $offset = ($current_page - 1) * $limit_record;

    $result = pdo_query("SELECT * FROM $table_name $where LIMIT $offset, $limit_record");
    return array($count_page, $result, $current_page);
}

$list_cate = cate_select_all();
