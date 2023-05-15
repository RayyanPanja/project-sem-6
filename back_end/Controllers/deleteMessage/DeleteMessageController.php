<?php
require "../../Classes/All.class.php";
require "../../include/include.php";

if (isset($_REQUEST['comment_id'])) {

    $CommentTable = new Table("comment", "Cid");
    if ($CommentTable->deleteFromPrimary($_REQUEST['comment_id'])) {
        justChangePath($URL->getView("Dashboard", "Dashboard"));
    }
}
