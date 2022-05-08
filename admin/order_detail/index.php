<?php
include_once "../../global.php";
include_once "../../dao/order.php";
check_session();

$order_id = $_REQUEST['order_id'];
$notice = "MÃ ĐƠN #" . $order_id;


if (isset($_REQUEST['controller']) && empty($_REQUEST['direct'])) {
    if ($_REQUEST['controller'] == "order_detail") {
        header('Location: ../' . $_REQUEST['controller'] . '?order_id=' . $_REQUEST['order_id']);
    } else {
        header('Location: ../' . $_REQUEST['controller'] . '/');
    }
}else if(isset($_REQUEST['confirm_order_one'])){
    date_default_timezone_set('ASIA/HO_CHI_MINH');
    $update_at = date('Y-m-d H:i:s');
    order_update(2, $update_at, $_REQUEST['order_id']);
    header('Location: ../order');
} else {
    $result = order_detail($_REQUEST['order_id']);
    $VIEW_PAGE = "list.php";
}
require_once "../layout.php";
