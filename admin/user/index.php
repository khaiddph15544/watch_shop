<?php
include_once "../../global.php";
include_once "../../dao/user.php";
check_session();

$showErr = "";
// --------------------Phân trang
$pagination = pagination(user_count(),4, 'users', "");
$count_page = $pagination[0];
$result = $pagination[1];
$current_page = $pagination[2];
// --------------------------

if (isset($_REQUEST['controller']) && empty($_REQUEST['direct'])) {
    header('Location: ../' . $_REQUEST['controller'] . '/');
} else if (isset($_REQUEST['direct'])) {
    if ($_REQUEST['direct'] == "add") {
        if (isset($_REQUEST['btn_add'])) {
            date_default_timezone_set('ASIA/HO_CHI_MINH');
            $create_at = date('Y-m-d H:i:s');
            extract($_REQUEST);

            if (
                $user_name != "" &&  $email != "" && $password != "" && $fullname != "" && $age != "" && $phone_number != ""
                 &&  $address != ""
            ) {

                if (!isset($_POST['gender'])) {
                    $gender = 0;
                }
                if (!isset($_POST['role'])) {
                    $role = 0;
                }

                if ($_FILES['image']['size'] > 0) {
                    $result_upload =  upload_image("avatar/");
                    if ($result_upload[0] == "") {
                        $showErr = $result_upload[1];
                    }
                    $image = $result_upload[0];
                } else {
                    $image = "avatar/default.jpg";
                }
                if ($image != "") {
                    user_new($user_name, $email, md5($password), $fullname, $image, $age, $phone_number, $gender, $role, $address, $create_at);
                    $showErr = "Thêm mới thành công";
                    header('refresh: 1; url=?');
                }
            } else {
                $showErr = "Không được để trống các trường";
            }
        }
    } elseif ($_REQUEST['direct'] == "update") {
        $result = user_select_one($_REQUEST['update_id']);
        if (isset($_REQUEST['btn_update'])) {

            date_default_timezone_set('ASIA/HO_CHI_MINH');
            $update_at = date('Y-m-d H:i:s');
            extract($_REQUEST);

            if (
                $user_name != "" &&  $email != "" && $fullname != "" && $age != "" && $phone_number != ""
                 &&  $address != ""
            ) {

                if (!isset($_POST['gender'])) {
                    $gender = $result['gender'];
                }
                if (!isset($_POST['role'])) {
                    $role = $result['role'];
                }

                if ($_FILES['image']['size'] > 0) {
                    $result_upload =  upload_image("avatar/");
                    if ($result_upload[0] == "") {
                        $showErr = $result_upload[1];
                    }
                    $image = $result_upload[0];
                } else {
                    $image = $result['avatar'];
                }
                if ($image != "") {
                    user_update($user_name, $email, $fullname, $image, $age, $phone_number, $gender, $role, $address, $update_at, $_REQUEST['update_id']);
                    $showErr = "Cập nhật thành công!";
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
            user_delete($value);
            header('Location: ?list');
        }
    }
} else {
    $VIEW_PAGE = "list.php";
}

require_once "../layout.php";
