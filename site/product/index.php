<?php
session_start();
include_once "../../global.php";
include_once "../../dao/product.php";
include_once "../../dao/category.php";
include_once "../../dao/pdo.php";
include_once "../../dao/comment.php";
include_once "../../dao/cart.php";

$title_page = "";
$main_title_sub_banner = "DANH MỤC SẢN PHẨM";
$sub_title = "SẢN PHẨM";
$status_session = "";
$user_id = 0;

if(!isset($_SESSION['isLogin'])){
    $status_session = "unset";
}else{
    $user_id = $_SESSION['isLogin']['user_id'];
}

$top_viewer = top_viewer();

if (isset($_REQUEST['direct']) && empty($_REQUEST['cate_id']) && empty($_REQUEST['filter'])) {
    header('Location: ../' . $_REQUEST['direct']);
} else if (isset($_REQUEST['direct']) && isset($_REQUEST['cate_id'])) {
    header('Location: ../' . $_REQUEST['direct'] . '?cate_id=' . $_REQUEST['cate_id']);
}else if (isset($_REQUEST['direct']) && isset($_REQUEST['filter'])) {
    header('Location: ../' . $_REQUEST['direct'] . '?filter=' . $_REQUEST['filter']);
}else if (isset($_REQUEST['action']) && isset($_REQUEST['id_pr'])) {
    $product_detail = product_detail($_REQUEST['id_pr']);
    $comments_detail =  comments_detail($_REQUEST['id_pr']);
    $VIEW_PAGE = $_REQUEST['action'] . ".php";
}  else {
    $sql = "SELECT * FROM products ORDER BY create_at DESC";
    $list_product = pdo_query($sql);
    $VIEW_PAGE = "list_product.php";
}

// --------------------------Chi tiết

if (isset($_REQUEST['action']) && isset($_REQUEST['id_pr'])) {

    product_increase_view($_REQUEST['id_pr']);
    $main_title_sub_banner = "CHI TIẾT SẢN PHẨM";
    $product_detail = product_detail($_REQUEST['id_pr']);
    $comment_detail =  comments_detail($_REQUEST['id_pr']);
    $count_cmt = count_comment_by_product($_REQUEST['id_pr']);

    date_default_timezone_set('ASIA/HO_CHI_MINH');
    $get_time = date('Y-m-d H:i:s');

    $product_involve = product_involve($product_detail['cate_id']);
    $VIEW_PAGE = "detail.php";
}

$brand = cate_select_all();
$top_viewer = top_viewer();

// ------------------------List product

require_once "../sub_banner.php";


function get_comment_time($comment_time)
{
    date_default_timezone_set('ASIA/HO_CHI_MINH');
    $get_time = date('Y-m-d H:i:s');
    $current_time = strtotime($get_time);

    $comment_time = strtotime($comment_time);

    $get_exact_time = abs($current_time - $comment_time);

    if ($get_exact_time < 60) { // < 60s
        $show_time = "$get_exact_time giây trước";
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
?>

<?php require_once "../layout.php" ?>

