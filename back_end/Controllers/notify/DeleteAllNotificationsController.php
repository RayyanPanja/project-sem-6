<?php
require "../../Classes/All.class.php";
require "../../include/include.php";

$Table = new Table("notifications","id");
$res = $Table->delete()->where("Notification_For",Session::getSession("Account_number"))->execute_query();
if($res){
    alert("All Notifications Deleted",$URL->getView('Dashboard',"Dashboard"));
}
