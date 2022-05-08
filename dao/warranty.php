<?php
    include_once "pdo.php";

    function warranty_select_all($user_id){
        $sql = "SELECT *, warranties.create_at AS create_at, warranties.status AS status FROM warranties INNER JOIN products ON warranties.product_id = products.product_id WHERE user_id = ?";

        return pdo_query($sql, $user_id);
    }

    function warranty_count(){
        $sql = "SELECT COUNT(*) FROM warranties";

        return pdo_query_count($sql);
    }

    function warranty_new($user_id, $product_id, $fullname, $create_at, $reason, $phone_number, $address){

        $sql = "INSERT INTO warranties (user_id, product_id, fullname, create_at, reason, phone_number, address, status) VALUES (?, ?, ?, ?, ?, ?, ?, 0)";

        pdo_execute($sql, $user_id, $product_id, $fullname, $create_at, $reason, $phone_number, $address);
    }

    function warranty_delete($warranty_id){
        $sql = "DELETE FROM warranties WHERE warranty_id = ?";

        pdo_execute($sql, $warranty_id);
    }

    function warranty_update($status, $warranty_id){
        $sql = "UPDATE warranties SET status = ? WHERE warranty_id = ?";

        pdo_execute($sql, $status, $warranty_id);
    }

?>