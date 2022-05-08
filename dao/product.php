<?php
include_once "pdo.php";

function product_new($product_name, $price, $image, $description, $discount, $model, $quantity, $status, $create_at, $cate_id)
{
    $reset_ai = "ALTER TABLE categories AUTO_INCREMENT = 1";
    pdo_execute($reset_ai);

    $sql = "INSERT INTO products(product_name, price, image, description, discount, model, quantity, status, create_at, cate_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    pdo_execute($sql, $product_name, $price, $image, $description, $discount, $model, $quantity, $status, $create_at, $cate_id);
}

function product_update($product_name, $price, $image, $description, $discount, $model, $quantity, $status, $update_at, $cate_id, $product_id)
{
    $sql = "UPDATE products SET product_name = ?, price = ?, image = ?, description = ?, discount = ?, model = ?,
        quantity = ?, status = ?, update_at = ?, cate_id = ? WHERE product_id = ?";

    pdo_execute($sql, $product_name, $price, $image, $description, $discount, $model, $quantity, $status, $update_at, $cate_id, $product_id);
}

function product_delete($product_id)
{
    $sql = "DELETE FROM products WHERE product_id = ?";

    pdo_execute($sql, $product_id);
}

function product_select_all()
{
    $sql = "SELECT products.*, categories.cate_name FROM products INNER JOIN categories ON products.cate_id = categories.cate_id";

    return pdo_query($sql);
}

function product_select_one($product_id)
{
    $sql = "SELECT * FROM products WHERE product_id = ?";

    return pdo_query_one($sql, $product_id);
}

function product_increase_view($product_id){
    $sql = "UPDATE products SET view = view +1 WHERE product_id = ?";

    pdo_execute($sql, $product_id);
}

function product_select_by_model($model)
{
    $sql = "SELECT * FROM products WHERE model = ?";

    return pdo_query($sql, $model);
}


function product_count()
{
    $sql = "SELECT count(*) FROM products";

    return pdo_query_count($sql);
}

function product_exist($product_name){
    $sql = "SELECT COUNT(*) FROM products WHERE product_name = ?";

    return pdo_query_value($sql, $product_name) > 0;
}

function product_count_by_model($model){
    $sql = "SELECT COUNT(*) FROM products WHERE model = ?";

    return pdo_query_count($sql, $model);
}

function product_count_by_price($price1, $price2){
    $sql = "SELECT COUNT(*) FROM products WHERE ROUND(price - (price * discount / 100)) >= ? AND ROUND(price - (price * discount / 100)) <= ?";

    return pdo_query_count($sql, $price1, $price2);
}

function product_count_by_cate_name($cate_name){
    $sql ="SELECT COUNT(*) FROM products INNER JOIN categories ON products.cate_id = categories.cate_id WHERE cate_name = ?";

    return pdo_query_count($sql, $cate_name);
}
function top_3_new_product()
{
    $sql = "SELECT * FROM products ORDER BY create_at DESC LIMIT 3";

    return pdo_query($sql);
}

function top_10_hot_sales()
{
    $sql = "SELECT * FROM products WHERE discount > 0 ORDER BY discount DESC LIMIT 10 ";

    return pdo_query($sql);
}

function top_5_best_seller()
{
    $sql = "SELECT products.*, SUM(order_detail.quantity) AS so_luong FROM order_detail INNER JOIN products ON products.product_id = order_detail.product_id
    GROUP BY order_detail.product_id ORDER BY SUM(order_detail.quantity) DESC LIMIT 5";

    return pdo_query($sql);
}

function top_5_best_viewer(){
    $sql = "SELECT * FROM products ORDER BY view DESC LIMIT 5";

    return pdo_query($sql);
}

function top_viewer()
{
    $sql = "SELECT * FROM products WHERE view > 0 ORDER BY view DESC LIMIT 5";

    return pdo_query($sql);
}

function product_detail($product_id)
{
    $sql = "SELECT * FROM products INNER JOIN categories on products.cate_id = categories.cate_id WHERE products.product_id = ?";
    return pdo_query_one($sql, $product_id);
}
function product_involve($cate_id)
{
    $sql = "SELECT * FROM products where cate_id = ?";
    return pdo_query($sql, $cate_id);
}
