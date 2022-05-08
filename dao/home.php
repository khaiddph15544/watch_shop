<?php
    include_once "pdo.php";

    function product_count(){
        $sql = "SELECT COUNT(*) FROM products";

        return pdo_query_count($sql);
    }

    function user_count(){
        $sql = "SELECT COUNT(*) FROM users";

        return pdo_query_count($sql);
    }

    function comment_count(){
        $sql = "SELECT COUNT(*) FROM comments";

        return pdo_query_count($sql);
    }

    function data_by_days(){
        $sql = "SELECT DATE(create_at) AS date, SUM(total_price) AS price_by_day FROM orders WHERE status = 2 GROUP BY DATE(create_at) ";

        return pdo_query($sql);
    }

    function top_5_user_newest(){
        $sql = "SELECT * FROM users ORDER BY create_at DESC LIMIT 5";

        return pdo_query($sql);
    }
?>