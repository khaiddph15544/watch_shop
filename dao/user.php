<?php
include_once "pdo.php";

function users_select_all()
{
    $sql = "SELECT * FROM users";

    return pdo_query($sql);
}

function user_select_one($user_id)
{
    $sql = "SELECT * FROM users WHERE user_id = ?";
    return pdo_query_one($sql, $user_id);
}

function user_new($user_name, $email, $password, $fullname, $avatar, $age, $phone_number, $gender, $role, $address, $create_at)
{
    $reset_ai = "ALTER TABLE categories AUTO_INCREMENT = 1";
    pdo_execute($reset_ai);

    $sql = "INSERT INTO users(user_name,email,password,fullname,avatar,age,phone_number, gender,role,address,create_at) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $user_name, $email, $password, $fullname, $avatar, $age, $phone_number, $gender, $role, $address, $create_at);
}
function user_update($user_name, $email, $fullname, $avatar, $age, $phone_number, $gender, $role, $address, $update_at, $user_id)
{
    $sql = "UPDATE users SET user_name = ? , email = ? , fullname = ?, avatar = ?, age = ?, phone_number = ?, gender = ?, role = ?, address = ?, update_at = ?  WHERE user_id = ?";
    pdo_execute($sql, $user_name, $email, $fullname, $avatar, $age, $phone_number, $gender, $role, $address, $update_at, $user_id);
}
function user_delete($user_id)
{
    $sql = "DELETE FROM users WHERE user_id = ?";

    if (is_array($user_id)) {
        foreach ($user_id as $delId) {
            pdo_execute($sql, $delId);
        }
    } else {
        pdo_execute($sql, $user_id);
    }
}

function user_exists($email){
    $sql = "SELECT COUNT(*) FROM users WHERE email = ?";

    return pdo_query_value($sql, $email) > 0;
}

function user_count()
{
    $sql = "SELECT COUNT(*) FROM users";

    return pdo_query_count($sql);
}

function check_user_to_login($email, $password){
    $sql = "SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1";

    return pdo_query_one($sql, $email, $password);
}

function find_password($email, $user_name){
    $sql = "SELECT email, user_name FROM users WHERE email = ? AND user_name = ?";

    return pdo_query_one($sql, $email, $user_name);
}

function reset_password($password, $email){
    $sql = "UPDATE users SET password = ? WHERE email = ?";

    pdo_execute($sql, $password, $email);
}

function change_password($password, $email){
    $sql = "UPDATE users SET password = ? WHERE email = ?";

    pdo_execute($sql, $password, $email);
}