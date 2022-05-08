<?php
include_once "../../global.php";
include_once "../../dao/order.php";
include_once "../../dao/pdo.php";

check_session();

// $result = order_select_all();
$order_confirmed = order_check_confirm(2);
$delivering = order_check_confirm(1);
$order_wait_confirm = order_check_confirm(0);
$canceled = order_check_confirm(3);


if (isset($_REQUEST['controller']) && empty($_REQUEST['direct'])) {
    if ($_REQUEST['controller'] == "order_detail") {
        header('Location: ../' . $_REQUEST['controller'] . '?order_id='.$_REQUEST['order_id']);
    } else {
        header('Location: ../' . $_REQUEST['controller'] . '/');
    }
}
else if(isset($_REQUEST['confirm_all'])){
    order_update_all();
    header('Location: ../order');
}else if(isset($_REQUEST['cancel_order'])){
    date_default_timezone_set('ASIA/HO_CHI_MINH');
    $update_at = date('Y-m-d H:i:s');
    order_update(3, $update_at, $_REQUEST['order_id']);
    header('Location: ?');
}
else {
    $VIEW_PAGE = "list.php";
}

require_once "../layout.php";
