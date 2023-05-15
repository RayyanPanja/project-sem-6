<?php
require "../../../Classes/All.class.php";
require "../../../include/include.php";

if ($_REQUEST['Email'] === Session::getSession("Email") && $_REQUEST['Contact'] === Session::getSession("Contact")) {
    alert("Nothing Changed", $URL->getView("Settings", "Settings"));
}

$UserTable = new Table("main", "Account_number");
$res = false;

if (isset($_REQUEST['Email'])) {
    $res = $UserTable->update("Email", $_REQUEST['Email'])->where("Account_number", Session::getSession("Account_number"))->execute_query();
}

if (isset($_REQUEST['Contact'])) {
    $res = $UserTable->update("Contact", $_REQUEST['Contact'])->where("Account_number", Session::getSession("Account_number"))->execute_query();
}

if ($res) {
    if (Session::referesh()) {
        justChangePath($URL->getView("Settings", "Settings"));
    } else {
        alert("Logout and Login Again", $URL->getView("Settings", "Settings"));
    }
}
