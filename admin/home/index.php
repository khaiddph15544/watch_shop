<?php
include_once "../../dao/home.php";
include_once "../../global.php";
check_session();
//Biểu đồ

$data =  data_by_days();


$dataPoints = array();
for ($i = 0; $i < count($data); $i++) {
    array_push($dataPoints, array("label" => $data[$i]['date'], "y" => $data[$i]['price_by_day']));
};

$cate_count = cate_count();
$product_count = product_count();
$user_count = user_count();
$comment_count = comment_count();
$order_count = order_count();
$top5 = top_5_user_newest();

if (isset($_REQUEST['controller']) && empty($_REQUEST['direct'])) {
    header('Location: ../' . $_REQUEST['controller'] . '/');
} elseif (array_key_exists('homepage', $_REQUEST)) {
    $stt = 1;
    $VIEW_PAGE = "homepage.php";
} else {
    header('Location: ?homepage');
}


require_once "../layout.php";
