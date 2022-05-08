<?php
include_once "pdo.php";

function order_new($create_at, $user_id, $address, $phone_number, $total_price)
{
    $reset_ai = "ALTER TABLE orders AUTO_INCREMENT = 1";
    pdo_execute($reset_ai);

    $sql = "INSERT INTO orders (create_at, user_id, address, phone_number, total_price, status) VALUES (?, ?, ?, ?, ?, 0)";

    $last_id = pdo_execute($sql, $create_at, $user_id, $address, $phone_number, $total_price);
    return $last_id; 
}

function order_delete($order_id)
{
    $sql = "DELETE FROM orders WHERE order_id = ?";

    if (is_array($order_id)) {
        foreach ($order_id as $delId) {
            pdo_execute($sql, $delId);
        }
    } else {

        pdo_execute($sql, $order_id);
    }
}

function order_select_all()
{
    $sql = "SELECT *, orders.phone_number AS phone_number, COUNT(*) count_product FROM order_detail INNER JOIN orders ON order_detail.order_id = orders.order_id INNER JOIN users ON orders.user_id = users.user_id GROUP BY order_detail.order_id ORDER BY orders.create_at DESC";

    return pdo_query($sql);
}

function order_select_one(){
    $sql = "SELECT order_id FROM orders ORDER BY create_at DESC LIMIT 1";

    return pdo_query_one($sql);
}
function order_count()
{
    $sql = "SELECT COUNT(*) FROM orders";

    return pdo_query_count($sql);
}

function order_detail($order_id){
    $sql = "SELECT p.product_id, p.image, p.product_name, od.quantity, od.price, od.discount FROM order_detail od
    INNER JOIN orders o ON od.order_id = o.order_id 
    INNER JOIN products p ON od.product_id = p.product_id 
    WHERE o.order_id = ?";

    return pdo_query($sql, $order_id);
}
function order_detail_new($order_id, $product_id, $price, $quantity, $discount){
    $sql = "INSERT INTO order_detail (order_id, product_id, price, quantity, discount) VALUES (?, ?, ?, ?, ?)";

    pdo_execute($sql, $order_id, $product_id, $price, $quantity, $discount);
}

function order_check_delivery($status, $user_id){
    $sql = "SELECT orders.order_id FROM orders WHERE status = ? AND user_id = ?";

    return pdo_query($sql, $status, $user_id);
}

function order_data_delivery($order_id){
    $sql = "SELECT o.order_id, o.total_price, p.product_id, p.image, p.product_name, od.quantity, od.price, od.discount FROM order_detail od
    INNER JOIN orders o ON od.order_id = o.order_id 
    INNER JOIN products p ON od.product_id = p.product_id 
    WHERE o.order_id = ?";

    return pdo_query($sql, $order_id);
}

function order_update($status, $update_at, $order_id){
    $sql = "UPDATE orders SET status = ?, update_at = ? WHERE order_id = ?";

    pdo_execute($sql, $status, $update_at, $order_id);
}

function order_check_confirm($status){
    $sql = "SELECT *, orders.phone_number AS phone_number, COUNT(*) count_product, orders.create_at, orders.update_at FROM order_detail INNER JOIN orders ON order_detail.order_id = orders.order_id INNER JOIN users ON orders.user_id = users.user_id WHERE status = ? GROUP BY order_detail.order_id ORDER BY orders.create_at DESC";

    return pdo_query($sql, $status);
}

function order_update_all(){
    $sql = "UPDATE orders SET status = 1 WHERE status = 0";

    pdo_execute($sql);
}