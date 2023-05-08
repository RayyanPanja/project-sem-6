<?php
require "../../Classes/All.class.php";
require "../../include/include.php";

if (isset($_REQUEST['id'])) {
    
    $Table = new Table("notifications");
    if ($Table->deleteFromPrimary($_REQUEST['id'])) {
        header("Location: {$URL->getView("Dashboard", "Dashboard")}");
    } else {
        justAlert("Naa");
    }
}
justAlert("Naa");
