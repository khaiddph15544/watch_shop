<?php
include_once "../../global.php";
include_once "../../dao/product.php";

check_session();
$showErr = "";

// --------------------Phân trang
$pagination = pagination(product_count(), 4, 'products', "INNER JOIN categories ON products.cate_id = categories.cate_id");
$count_page = $pagination[0];
$result = $pagination[1];
$current_page = $pagination[2];
// --------------------------

if (isset($_REQUEST['controller']) && empty($_REQUEST['direct'])) {
    header('Location: ../' . $_REQUEST['controller'] . '/');
} else if (isset($_REQUEST['direct'])) {
    $result = cate_select_all();

    if ($_REQUEST['direct'] == "add") {

        if (isset($_REQUEST['btn_add'])) {
            extract($_REQUEST);

            if (
                $product_name != "" && $price != "" && $_FILES['image']['size'] > 0 && $description != "" && $discount != ""  && $quantity != ""
                && $status != "" && $cate_id != ""
            ) {
                date_default_timezone_set('ASIA/HO_CHI_MINH');
                $create_at = date('Y-m-d H:i:s');

                $result_upload =  upload_image("img/");
                if ($result_upload[0] != "") {
                    $showErr = $result_upload[1];
                }$image = $result_upload[0];

                if ($image != "") {
                    product_new($product_name, $price, $image, $description, $discount, 0, $quantity, $status, $create_at, $cate_id);
                    $showErr = "Thêm mới thành công";
                  header('refresh: 1; url=?');
                    
                }
            } else {
                $showErr = "Không được để trống các trường";
            }
        }
    } else if ($_REQUEST['direct'] == "update") {
        $rows = product_select_one($_REQUEST['update_id']);

        $description =  $rows['description'];
        if (isset($_REQUEST['btn_update'])) {
            extract($_REQUEST);

            if (
                $product_name != "" && $price != "" && $description != "" && $discount != "" && $quantity != ""
                && $status != "" && $cate_id != ""
            ) {
                date_default_timezone_set('ASIA/HO_CHI_MINH');
                $update_at = date('Y-m-d H:i:s');

                if (!isset($_POST['model'])) {
                    $model = $rows['model'];
                }
                if(!isset($_POST['cate_id'])){
                    $cate_id = $rows['cate_id'];
                }

                if ($_FILES['image']['size'] > 0) {
                    $result_upload =  upload_image("img/");
                    if ($result_upload[0] == "") {
                        $showErr = $result_upload[1];
                    }
                    $image = $result_upload[0];
                } else {
                    $image = $rows['image'];
                }

                if ($image != "") {
                    product_update($product_name, $price, $image, $description, $discount, $model, $quantity, $status, $update_at, $cate_id, $_REQUEST['update_id']);
                    $showErr = "Cập nhật thành công";
                    header('refresh: 1; url = ?');
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
            product_delete($value);
            header('Location: ?list');
        }
    }
} else if (isset($_GET['delId'])) {
    $delId = $_GET['delId'];

    product_delete($delId);
    header('Location: ?list');
} else {
    $VIEW_PAGE = "list.php";
}

require_once "../layout.php";
