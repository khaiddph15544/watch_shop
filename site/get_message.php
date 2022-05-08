<?php
session_start();
include_once "../dao/pdo.php";
include_once "../dao/chat.php";
$result = chat_select_by_user($_SESSION['isLogin']['user_id'], $_SESSION['isLogin']['user_id']);

foreach ($result as $rows) {
    if ($rows['recipient_id'] == null) { ?>
        <div class="message_group">
            <div class="message_right">
                <span><?php echo $rows['content'] ?></span>
            </div>
        </div>
    <?php } else { ?>
        <div class="message_group">
            <div class="message_left">
                <span><?php echo $rows['content'] ?></span>
            </div>
        </div>
<?php }
}



