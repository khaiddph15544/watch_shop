<?php
include_once "pdo.php";

function cate_new($cate_name, $create_at)
{
    $reset_ai = "ALTER TABLE categories AUTO_INCREMENT = 1";
    pdo_execute($reset_ai);


    $sql = "INSERT INTO categories(cate_name, create_at) VALUES (?, ?)";

    pdo_execute($sql, $cate_name, $create_at);
}

function cate_update($cate_name, $update_at, $cate_id)
{
    $sql = "UPDATE categories SET cate_name = ?, update_at = ? WHERE cate_id = ?";

    pdo_execute($sql, $cate_name, $update_at, $cate_id);
}

function cate_delete($cate_id)
{
    $sql = "DELETE FROM categories WHERE cate_id = ?";

    if (is_array($cate_id)) {
        foreach ($cate_id as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $cate_id);
    }
}

function cate_select_all()
{
    $sql = "SELECT * FROM categories";

    return pdo_query($sql);
}

function cate_select_one($cate_id)
{
    $sql = "SELECT * FROM categories WHERE cate_id = ?";

    return pdo_query_one($sql, $cate_id);
}

function cate_count(){
    $sql = "SELECT COUNT(*) FROM categories";

    return pdo_query_count($sql);
}

function cate_exist($cate_name){
    $sql = "SELECT COUNT(*) FROM categories WHERE cate_name = ?";

    return pdo_query_value($sql, $cate_name) > 0;
}