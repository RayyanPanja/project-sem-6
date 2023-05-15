<?php
require "../../../Classes/All.class.php";
require "../../../include/include.php";

if ($_FILES['Profile']['name'] === Session::getSession("Img_Path")) {
    alert("Nothing Changed", $URL->getView("Settings", "Settings"));
}

$UserTable = new Table("main", "Account_number");
$res = false;

$res = move_uploaded_file($_FILES["Profile"]['tmp_name'], "../../../../storage/profiles/" . Session::getSession("Img_Path"));

if (isset($_FILES['Profile']["name"])) {
    $res = $UserTable->update("Img_Path", Session::getSession("Img_Path"))->where("Account_number", Session::getSession("Account_number"))->execute_query();
}

if ($res) {
    if (Session::referesh()) {
        alert("If You Dont See Changes , Referesh Page to See Change",$URL->getView("Settings", "Settings"));
    } else {
        alert("Logout and Login Again", $URL->getView("Settings", "Settings"));
    }
}
