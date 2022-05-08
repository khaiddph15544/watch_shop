<?php
    include_once "pdo.php";
    function add_to_cart($user_id, $product_id, $price, $quantity){
        $sql = "INSERT INTO cart (user_id, product_id, price, quantity) VALUES (?, ?, ?, ?)";

        pdo_execute($sql, $user_id, $product_id, $price, $quantity);
    }
    function add_exist_item_cart($quantity, $user_id, $product_id){
        $sql = "UPDATE cart SET quantity = (quantity + ?) WHERE user_id = ? AND product_id = ?";
        
        pdo_execute($sql, $quantity, $user_id, $product_id);
    }

    function cart_update($quantity, $user_id, $product_id){
        $sql = "UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?";

        pdo_execute($sql, $quantity, $user_id, $product_id);
    }
    function cart_delete($product_id){
        $sql = "DELETE FROM cart WHERE product_id = ?";

        pdo_execute($sql, $product_id);
    }

    function cart_show_all_admin(){
        $sql = "SELECT *, users.user_name, COUNT(cart.quantity) as quantity_in_cart, SUM(cart.price * cart.quantity) AS total_price FROM cart INNER JOIN products ON cart.product_id = products.product_id INNER JOIN users ON users.user_id = cart.user_id
        GROUP BY users.user_id ORDER BY cart_id DESC";

        return pdo_query($sql);
    }

    function cart_show_by_user($user_id){
        $sql = "SELECT *, cart.price, cart.quantity FROM cart INNER JOIN products ON cart.product_id = products.product_id WHERE user_id = ?";

        return pdo_query($sql, $user_id);
    }

    function cart_select_all($user_id){
        $sql = "SELECT *, SUM(cart.quantity) as quantity_in_cart FROM cart INNER JOIN products ON cart.product_id = products.product_id INNER JOIN users ON users.user_id = cart.user_id
         WHERE cart.user_id = ? GROUP BY products.product_id ORDER BY cart_id DESC";

        return pdo_query($sql, $user_id);
    }

    function cart_exist_product($user_id, $product_id){
        $sql = "SELECT COUNT(*) FROM cart WHERE user_id = ? AND product_id = ?";

        return pdo_query_value($sql, $user_id, $product_id);
    }

?>