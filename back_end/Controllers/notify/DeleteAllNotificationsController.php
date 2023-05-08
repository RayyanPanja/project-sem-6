<?php
require "../../Classes/All.class.php";
require "../../include/include.php";

$Table = new Table("notifications");
$res = $Table->deleteFromColumn("Notification_For",Session::getSession("Account_number"));
if($res){
    alert("All Notifications Deleted",$URL->getView('Dashboard',"Dashboard"));
}
