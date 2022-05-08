<?php
session_start();
include_once "../../global.php";
include_once "../../dao/pdo.php";
include_once "../../dao/product.php";
include_once "../../dao/comment.php";
include_once "../../dao/cart.php";
include_once "../../dao/warranty.php";
check_session();

$sub_title = "BẢO HÀNH";
if (isset($_REQUEST['direct']) && empty($_REQUEST['filter'])) {
    header('Location: ../' . $_REQUEST['direct']);
} else if (isset($_REQUEST['direct']) && isset($_REQUEST['filter'])) {
    header('Location: ../' . $_REQUEST['direct'] . '?filter=' . $_REQUEST['filter']);
}else if (isset($_REQUEST['action'])) {
    if(isset($_REQUEST['id_pr'])){
        header('Location: ../product/?action='.$_REQUEST['action'].'&id_pr='.$_REQUEST['id_pr']) ;
    }
} elseif(isset($_REQUEST['warranty_delete'])){
    warranty_delete($_REQUEST['delId']);
    header('Location: ?warranty_infor');
} else if(isset($_REQUEST['register_warranty'])) {
    $list_product  = product_select_all();
    $main_title_sub_banner = "ĐĂNG KÝ BẢO HÀNH";

    if (isset($_REQUEST['btn_warranty'])) {
        date_default_timezone_set('ASIA/HO_CHI_MINH');
        $create_at = date('Y-m-d H:i:s');
        extract($_REQUEST);
    
        warranty_new($_SESSION['isLogin']['user_id'], $product_name, $fullname, $create_at, $product_status, $phone_number, $district . ' ' . $province);
        header('Location: ?warranty_success');
    }
    $VIEW_PAGE = "register_warranty.php";
}
else{
    $main_title_sub_banner = "THÔNG TIN BẢO HÀNH";
    $list_warranty = warranty_select_all($_SESSION['isLogin']['user_id']);
    $count_warranty = count($list_warranty);

    if ($count_warranty > 0) {
        $VIEW_PAGE = "warranty_infor.php";

        if(isset($_REQUEST['confirm_warranty'])){
            warranty_update(1, $_REQUEST['confirm_id']);
            header('Location: ?');
        }
    } else {
        $VIEW_PAGE = "warranty_empty.php";
    }
}
if(isset($_REQUEST['warranty_success'])){
    $main_title_sub_banner = "ĐĂNG KÝ BẢO HÀNH";
    $sub_title = "BẢO HÀNH";
    $VIEW_PAGE = "warranty_success.php";
}

require_once "../sub_banner.php";
?>

<?php require "../layout.php" ?>