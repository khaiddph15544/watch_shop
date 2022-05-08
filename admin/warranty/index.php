<?php
include_once "../../global.php";
include_once "../../dao/warranty.php";

check_session();
$limit_record = 4;
$count_record = warranty_count();
$count_page = ceil($count_record / $limit_record);

if (isset($_GET['page'])) {
    $current_page = $_GET['page'];
} else {
    $current_page = 1;
}

$offset = ($current_page - 1) * $limit_record;
$sql = "SELECT * FROM warranties LIMIT $offset, $limit_record";
$result = pdo_query($sql);

if (isset($_REQUEST['controller']) && empty($_REQUEST['direct'])) {
    header('Location: ../' . $_REQUEST['controller'] . '/');
} else if (isset($_REQUEST['direct'])) {
    $VIEW_PAGE = $_REQUEST['direct'] . ".php";
} else {
    $VIEW_PAGE = "list.php";
}

require_once "../layout.php";
