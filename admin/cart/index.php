<?php
include_once "../../global.php";
include_once "../../dao/cart.php";
include_once "../../dao/user.php";
check_session();

$showErr = "";
// --------------------------

$stt =1;
if (isset($_REQUEST['controller']) && empty($_REQUEST['direct'])) {
    header('Location: ../' . $_REQUEST['controller'] . '/');
}else if (isset($_REQUEST["user_id"])) {
    $data_user = user_select_one($_REQUEST['user_id']);
    $notice = "Giỏ hàng của @"  . $data_user['user_name']; 
    $result = cart_show_by_user($_REQUEST['user_id']);
    $VIEW_PAGE = $_REQUEST['direct'] . ".php";
}  else {
    $result =  cart_show_all_admin();
    $VIEW_PAGE = "list.php";
}

require_once "../layout.php";