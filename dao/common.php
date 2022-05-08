<?php
include_once "pdo.php";

function search($product_name){
   $sql = "SELECT * FROM products WHERE product_name LIKE ?";
   return pdo_query($sql,'%'.$product_name.'%');
}
