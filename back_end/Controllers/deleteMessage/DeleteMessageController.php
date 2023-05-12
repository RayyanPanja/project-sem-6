<?php
require "../../Classes/All.class.php";
require "../../include/include.php";
require "../../Logic/DeleteMessageLogic.php";

if (isset($_REQUEST['comment_id'])) {

    if (check_if_not_null("Reference_to_Message", $_REQUEST['comment_id'])) {
        $CommentTable = new Table("comment", "Cid");
        if ($CommentTable->deleteFromPrimary($_REQUEST['comment_id'])) {
            justChangePath($URL->getView("Dashboard", "Dashboard"));
        }
    }
}
