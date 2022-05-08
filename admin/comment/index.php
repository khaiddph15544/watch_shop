<?php
include_once "../../global.php";
include_once "../../dao/comment.php";

check_session();
if (isset($_REQUEST['controller']) && empty($_REQUEST['direct'])) {
    header('Location: ../' . $_REQUEST['controller'] . '/');
} else if (isset($_REQUEST['direct']) && empty($_REQUEST['product_id'])) {
    $VIEW_PAGE = $_REQUEST['direct'] . ".php";
}
else if (isset($_REQUEST["product_id"])) {
    $result = comments_detail($_REQUEST["product_id"]);

    if (isset($_POST['remove_all'])) {
        if (isset($_POST['remove'])) {
            foreach ($_POST['remove'] as $key => $value) {
                comment_delete($value);
                header('Location: '.$_SERVER['REQUEST_URI']);
            }
        }
    }
    if(isset($_GET['delId'])){
        $delId = $_GET['delId'];

        echo $delId;
        // comment_delete($delId);
        // header('Location: '.$_SERVER['REQUEST_URI']);
        
    }
    $VIEW_PAGE = "cmt_detail.php";
}
else {
    $result = comment_by_product();
    $VIEW_PAGE = "list.php";
}

require_once "../layout.php";