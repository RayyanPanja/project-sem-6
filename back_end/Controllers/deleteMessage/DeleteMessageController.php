<?php
require "../../Classes/All.class.php";
require "../../include/include.php";

if (isset($_REQUEST['comment_id'])) {

    $CommentTable = new Table("comment", "Cid");
    if ($CommentTable->delete()->where("Cid",$_REQUEST['comment_id'])->execute_query()) {
        justChangePath($URL->getView("Dashboard", "Dashboard"));
    }
}
