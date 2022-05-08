<?php
session_start();
include_once "../../dao/user.php";
include_once "../../global.php";
include_once "../../dao/cart.php";
check_login();
$showErr = "";


$rows = $_SESSION['isLogin'];
    if ($rows['gender'] == 0) {
        $gender = "Nam";
        $next_gender = "Nữ";
    } else if ($rows['gender'] == 1) {
        $gender = "Nữ";
        $next_gender = "Nam";
    }

    if ($gender == "Nam") {
        $value_gender = array(0, 1);
    } else {
        $value_gender = array(1, 0);
    }

if (isset($_REQUEST['direct']) && empty($_REQUEST['cate_id']) && empty($_REQUEST['filter'])) {
    header('Location: ../' . $_REQUEST['direct']);
} else if (isset($_REQUEST['direct']) && isset($_REQUEST['cate_id'])) {
    header('Location: ../' . $_REQUEST['direct'] . '?cate_id=' . $_REQUEST['cate_id']);
}else if (isset($_REQUEST['direct']) && isset($_REQUEST['filter'])) {
    header('Location: ../' . $_REQUEST['direct'] . '?filter=' . $_REQUEST['filter']);
}else if (isset($_REQUEST['action'])) {
    if(isset($_REQUEST['id_pr'])){
        header('Location: ../product/?action='.$_REQUEST['action'].'&id_pr='.$_REQUEST['id_pr']) ;
    }
    
}  else if (isset($_REQUEST['manage_user'])) {

    extract($_REQUEST);
    date_default_timezone_set('ASIA/HO_CHI_MINH');
    $update_at = date('Y-m-d H:i:s');

    if (isset($_REQUEST['update_user'])) {
        if ($_FILES['image']['size'] > 0) {
            $result_upload =  upload_image("../../admin/user/avatar/");
            if ($result_upload[0] == "") {
                $showErr = $result_upload[1];
            }
            $image = $result_upload[0];
        } else {
            $image = $rows['avatar'];
        }

        user_update($user_name, $_SESSION['isLogin']['email'], $fullname, $image, $age, $phone_number, $gender, $_SESSION['isLogin']['role'], $address, $update_at, $_SESSION['isLogin']['user_id']);
        $user_infor_new = user_select_one($_SESSION['isLogin']['user_id']);
        $_SESSION['isLogin'] = $user_infor_new;
      
      if ($user_infor_new['gender'] == 0) {
        $gender = "Nam";
        $next_gender = "Nữ";
    } else if ($user_infor_new['gender'] == 1) {
        $gender = "Nữ";
        $next_gender = "Nam";
    }

    if ($gender == "Nam") {
        $value_gender = array(0, 1);
    } else {
        $value_gender = array(1, 0);
    }
        $showErr = "Cập nhật thông tin thành công!";
    }

    $VIEW_PAGE = "manage_user.php";
} else if (isset($_REQUEST['change_password'])) {
    $VIEW_PAGE = "change_password.php";
}
?>
<?php require_once "../layout.php" ?>