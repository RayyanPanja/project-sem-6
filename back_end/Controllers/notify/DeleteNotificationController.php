<?php
require "../../Classes/All.class.php";
require "../../include/include.php";

if (isset($_REQUEST['id'])) {
    
    $Table = new Table("notifications","id");
    if ($Table->delete()->where("id",$_REQUEST['id'])->execute_query()) {
        header("Location: {$URL->getView("Dashboard", "Dashboard")}");
    } else {
        justAlert("Naa");
    }
}
justAlert("Naa");
