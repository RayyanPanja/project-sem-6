<?php
require "../../Classes/All.class.php";
require "../../include/include.php";

if (isset($_REQUEST['comment_id'])) {
    $Table = new Table("comment", "Cid");
    if ($Table->deleteFromPrimary($_REQUEST['comment_id'])) {
        justChangePath($URL->getView("Dashboard", "Dashboard"));
    }else{
        alert("Deletion Failed", $URL->getView("Dashboard", "Dashboard"));
    }
}
