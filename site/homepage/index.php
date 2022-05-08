<?php
session_start();
include_once "../../global.php";
include_once "../../dao/slider.php";
include_once "../../dao/product.php";
include_once "../../dao/category.php";
include_once "../../dao/comment.php";
include_once "../../dao/cart.php";
include_once "../../dao/chat.php";



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
    
} else {
    $duration = 100;
    $new_product = top_3_new_product();
    $best_seller = top_5_best_seller();
    $best_viewer = top_5_best_viewer();
    if(count($best_seller) >= 5){
        foreach ($best_seller as $rows) {
            $a[] = $rows;
        };
    }
    else{
        foreach ($best_viewer as $rows) {
            $a[] = $rows;
        };
    }
    
    $row_left = array_chunk($a, 3)[0];
    $row_right = array_chunk($a, 3)[1];

    $hot_sales = top_10_hot_sales();
    $result = slider_select_all();
    $VIEW_PAGE = "./layout.php";
}
require "../layout.php";
