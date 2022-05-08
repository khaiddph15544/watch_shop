<?php
    function chat_select_by_user($sender_id, $recipient_id){
        $sql = "SELECT * FROM chat INNER JOIN chat_content ON chat.chat_id = chat_content.chat_id WHERE sender_id = ? OR recipient_id = ?";

        return pdo_query($sql, $sender_id, $recipient_id);
    }
    function select_count_by_user($sender_id, $recipient_id){
        $sql = "SELECT count(*) as all_rows FROM chat INNER JOIN chat_content ON chat.chat_id = chat_content.chat_id WHERE sender_id = ? OR recipient_id = ?";

        return pdo_query_one($sql, $sender_id, $recipient_id);
    }

    function chat_select_all(){
        $sql = "SELECT *, chat_content.create_at AS create_at FROM chat INNER JOIN chat_content ON chat.chat_id = chat_content.chat_id 
        INNER JOIN users ON chat.sender_id = users.user_id WHERE users.role = 0 GROUP BY chat.sender_id";

        return pdo_query($sql);
    }
    function chat_select_last($sender_id, $recipient_id){
        $sql = "SELECT chat_content.content, chat_content.create_at, users.user_id, users.avatar, users.user_name FROM chat 
        INNER JOIN chat_content ON chat.chat_id = chat_content.chat_id INNER JOIN users ON chat.sender_id = users.user_id 
        WHERE chat.sender_id = ? OR chat.recipient_id = ? ORDER BY chat.chat_id DESC LIMIT 1";

        return pdo_query_one($sql, $sender_id, $recipient_id);
    }

    function message_new($sender_id, $recipient_id){
        $sql = "INSERT INTO chat(sender_id, recipient_id) VALUES (?, ?)";

        $last_id = pdo_execute($sql, $sender_id, $recipient_id);

        return $last_id;
    }


    function message_content_new($chat_id, $content, $create_at, $status){
        $sql = "INSERT INTO chat_content(chat_id, content, create_at, status) VALUES (?, ?, ?, ?)";

        pdo_execute($sql, $chat_id, $content, $create_at, $status);
    }
?>