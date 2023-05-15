<?php
require "../../../Classes/All.class.php";
require "../../../include/include.php";

if ($_REQUEST['Sirname'] && $_REQUEST['Firstname'] && $_REQUEST['Fathername']) {
    alert("Nothing Changed", $URL->getView("Settings", "Settings"));
}

$UserTable = new Table("main", "Account_number");
$res = false;

if (isset($_REQUEST['Sirname'])) {
    $res = $UserTable->update("Sirname", $_REQUEST['Sirname'])->where("Account_number", Session::getSession("Account_number"))->execute_query();
}

if (isset($_REQUEST['Firstname'])) {
    $res = $UserTable->update("Firstname", $_REQUEST['Firstname'])->where("Account_number", Session::getSession("Account_number"))->execute_query();
}

if (isset($_REQUEST['Fathername'])) {
    $res = $UserTable->update("Fathername", $_REQUEST['Fathername'])->where("Account_number", Session::getSession("Account_number"))->execute_query();
}

if ($res) {
    if (Session::referesh()) {
        justChangePath($URL->getView("Settings", "Settings"));
    } else {
        alert("Logout and Login Again", $URL->getView("Settings", "Settings"));
    }
}
