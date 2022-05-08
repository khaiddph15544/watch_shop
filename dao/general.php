<?php
    include_once "pdo.php";

    function general_by_category(){
        $sql = "SELECT c.cate_name, COUNT(*) AS quantity, MIN(p.price) AS min_price, MAX(p.price) AS max_price, AVG(p.price) AS avg_price 
        FROM categories c INNER JOIN products p ON c.cate_id = p.cate_id GROUP BY c.cate_id, c.cate_name HAVING quantity > 0";

        return pdo_query($sql);
    }

    function monthly_revenue(){
        $sql = "SELECT ";
    }

?>