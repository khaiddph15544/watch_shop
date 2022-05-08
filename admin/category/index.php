<?php
include_once "../../global.php";
include_once "../../dao/category.php";
check_session();

$showErr = "";
// --------------------Phân trang
$pagination = pagination(cate_count(),4, 'categories', "");
$count_page = $pagination[0];
$result = $pagination[1];
$current_page = $pagination[2];
// --------------------------


if (isset($_REQUEST['controller']) && empty($_REQUEST['direct'])) {
    header('Location: ../' . $_REQUEST['controller'] . '/');
} else if (isset($_REQUEST['direct'])) {
    if ($_REQUEST['direct'] == "add") {
        if (isset($_REQUEST['btn_add'])) {
            extract($_REQUEST);

            date_default_timezone_set('ASIA/HO_CHI_MINH');
            $create_at = date('Y-m-d H:i:s');
            $check_exist =  cate_exist($cate_name);

            if($cate_name != ""){
                if(!$check_exist){
                    cate_new($cate_name, $create_at);
                    $showErr = "Thêm mới thành công!";
                    header('refresh: 1; url = ?');
                }else{
                    $showErr = "Loại hàng đã tồn tại";
                }
            }else{
                $showErr = "Không được để trống các trường";
            }
            
        }
    } else if ($_REQUEST['direct'] == "update") {
        $update_id = $_GET['update_id'];
        $rows = cate_select_one($update_id);
        if (isset($_REQUEST['btn_update'])) {
            extract($_REQUEST);
            var_dump($_REQUEST);
            date_default_timezone_set('ASIA/HO_CHI_MINH');
            $update_at = date('Y-m-d H:i:s');
            $check_exist =  cate_exist($cate_name);

            if($cate_name != ""){
                if(!$check_exist || $cate_name == $rows['cate_name']){
                    cate_update($cate_name, $update_at, $update_id);
                    $showErr = "Cập nhật thành công!";
                    header('refresh: 1; url = ?');
                }else{
                    $showErr = "Loại hàng đã tồn tại";
                }
            }else{
                $showErr = "Không được để trống các trường!";
            }
        }
    }

    $VIEW_PAGE = $_REQUEST['direct'] . ".php";
} else if (isset($_POST['remove_all'])) {
    if (isset($_POST['remove'])) {
        foreach ($_POST['remove'] as $key => $value) {
            cate_delete($value);
            header('Location: ?list');
        }
    }
} else if (isset($_GET['delId'])) {
    $delId = $_GET['delId'];

    cate_delete($delId);
    header('Location: ?list');
} else {
    $VIEW_PAGE = "list.php";
}

require_once "../layout.php";
