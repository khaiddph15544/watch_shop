<?php

include_once "../dao/user.php";
include_once "../dao/comment.php";


if (isset($_REQUEST["action"])) {
    
    user_delete($_REQUEST["id_user"]);
}
if(isset($_REQUEST['del_cmt'])){
    extract($_REQUEST);
    comment_delete($id_cmt);
}
