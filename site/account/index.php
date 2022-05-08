<?php
include_once "../../dao/user.php";
include_once "../../global.php";

if (isset($_REQUEST['direct']) && empty($_REQUEST['cate_id']) && empty($_REQUEST['filter'])) {
    header('Location: ../' . $_REQUEST['direct']);
} else if (isset($_REQUEST['direct']) && isset($_REQUEST['cate_id'])) {
    header('Location: ../' . $_REQUEST['direct'] . '?cate_id=' . $_REQUEST['cate_id']);
} else if (isset($_REQUEST['direct']) && isset($_REQUEST['filter'])) {
    header('Location: ../' . $_REQUEST['direct'] . '?filter=' . $_REQUEST['filter']);
} else if (isset($_REQUEST['action'])) {
    if (isset($_REQUEST['id_pr'])) {
        header('Location: ../product/?action=' . $_REQUEST['action'] . '&id_pr=' . $_REQUEST['id_pr']);
    }
}
if (isset($_REQUEST['action'])) {
    $VIEW_PAGE =  '' . $_REQUEST['action'] . ".php";
} else {
    $VIEW_PAGE = "login.php";
}
?>
<?php require_once "../layout.php" ?>