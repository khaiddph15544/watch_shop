<?php
include_once "../../global.php";
include_once "../../dao/general.php";
check_session();

if (isset($_REQUEST['controller']) && empty($_REQUEST['direct'])) {
    header('Location: ../' . $_REQUEST['controller'] . '/');
} else if (isset($_REQUEST['direct'])) {
    $VIEW_PAGE = $_REQUEST['direct'] . ".php";
}
else if(isset($_POST['chart'])){
    $list = general_by_category();
    $VIEW_PAGE = "chart.php";
} else {
    $result = general_by_category();
    $VIEW_PAGE = "list.php";
}

require_once "../layout.php";
