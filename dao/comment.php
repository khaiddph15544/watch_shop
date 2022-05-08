<?php
include_once "pdo.php";

function comment_by_product()
{
    $sql = "SELECT p.product_id, p.product_name, COUNT(*) quantity,  
        MIN(c.create_at) oldest_cmt, MAX(c.create_at) newest_cmt
        FROM  products p INNER JOIN comments c  ON p.product_id = c.product_id
        GROUP BY p.product_name HAVING quantity > 0";

    return  pdo_query($sql);
}

function comment_delete($comment_id)
{
    $sql = "DELETE FROM comments WHERE comment_id = ?";

    if (is_array($comment_id)) {
        foreach ($comment_id as $delId) {
            pdo_execute($sql, $delId);
        }
    } else {
        pdo_execute($sql, $comment_id);
    }
}
function comments_detail($product_id)
{
    $sql = 'SELECT *, comments.create_at as comment_time FROM products INNER JOIN comments ON products.product_id = comments.product_id
    INNER JOIN users on comments.user_id = users.user_id WHERE products.product_id = ? order by comments.create_at DESC';
    return pdo_query($sql, $product_id);
}

function count_comment_by_product($product_id){
    $sql = "SELECT COUNT(*) FROM comments WHERE product_id = ?";

    return pdo_query_count($sql, $product_id);
}

function comment_new($content, $create_at, $user_id, $product_id)
{
    $sql = "INSERT into comments(content,create_at,user_id,product_id)
    VALUE(?,?,?,?)";
    return pdo_execute($sql, $content, $create_at, $user_id, $product_id);
}