<?php
include_once "../../global.php";
include_once "../../dao/slider.php";
check_session();
$showErr = "";

if (isset($_REQUEST['controller']) && empty($_REQUEST['direct'])) {
    header('Location: ../' . $_REQUEST['controller'] . '/');
} else if (isset($_REQUEST['direct'])) {
    if ($_REQUEST['direct'] == "add") {
        if (isset($_REQUEST['btn_add'])) {
            extract($_REQUEST);

            date_default_timezone_set('ASIA/HO_CHI_MINH');
            $create_at = date('Y-m-d H:i:s');

            if (
                $slider_name != "" &&  $_FILES['image']['size'] > 0 && $product_id != ""
            ) {
                $result_upload =  upload_image("img/");
                if ($result_upload[0] == "") {
                    $showErr = $result_upload[1];
                }
                $image = $result_upload[0];
                if ($image != "") {
                    slider_new($slider_name, $image, $create_at, $product_id);
                    $showErr = "Thêm mới thành công";
                    header('refresh: 1; url=?');
                }
            } else {
                $showErr = "Không được để trống các trường";
            }
        }
    } else if ($_REQUEST['direct'] == "update") {
        $update_id = $_GET['update_id'];
        $rows = slider_select_one($update_id);
        if (isset($_REQUEST['btn_update'])) {
            extract($_REQUEST);
            date_default_timezone_set('ASIA/HO_CHI_MINH');
            $update_at = date('Y-m-d H:i:s');

            if (
                $slider_name != "" && $product_id != ""
            ) {
                if ($_FILES['image']['size'] > 0) {
                    $result_upload =  upload_image("img/");
                    if ($result_upload[0] == "") {
                        $showErr = $result_upload[1];
                    }
                    $image = $result_upload[0];
                }else{
                    $image = $rows['image'];
                }

                if ($image != "") {
                    slider_update($slider_name, $image, $update_at, $product_id, $update_id);
                    $showErr = "Cập nhật thành công";
                    header('refresh: 1; url=?');
                }
            } else {
                $showErr = "Không được để trống các trường";
            }
        }
    }

    $VIEW_PAGE = $_REQUEST['direct'] . ".php";
} else if (isset($_POST['remove_all'])) {
    if (isset($_POST['remove'])) {
        foreach ($_POST['remove'] as $key => $value) {
            slider_delete($value);
            header('Location: ?list');
        }
    }
} else if (isset($_GET['delId'])) {
    $delId = $_GET['delId'];

    slider_delete($delId);
    header('Location: ?list');
} else {
    $result = slider_select_all();
    $VIEW_PAGE = "list.php";
}

require_once "../layout.php";
