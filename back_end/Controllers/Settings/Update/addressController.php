<?php
require "../../../Classes/All.class.php";
require "../../../include/include.php";

if ($_REQUEST['Address'] === Session::getSession("Address") && $_REQUEST['PinCode'] === Session::getSession("City") && $_REQUEST['PinCode'] === Session::getSession("Pin_Code") && $_REQUEST['State'] === Session::getSession("State") && $_REQUEST['Country'] === Session::getSession("Country")) {
    alert("Nothing Changed", $URL->getView("Settings", "Settings"));
}

$UserTable = new Table("main", "Account_number");
$res = false;

if (isset($_REQUEST['Address'])) {
    $res = $UserTable->update("Address", $_REQUEST['Address'])->where("Account_number", Session::getSession("Account_number"))->execute_query();
}

if (isset($_REQUEST['City'])) {
    $res = $UserTable->update("City", $_REQUEST['City'])->where("Account_number", Session::getSession("Account_number"))->execute_query();
}

if (isset($_REQUEST['PinCode'])) {
    $res = $UserTable->update("Pin_Code", $_REQUEST['PinCode'])->where("Account_number", Session::getSession("Account_number"))->execute_query();
}

if (isset($_REQUEST['State'])) {
    $res = $UserTable->update("State", $_REQUEST['State'])->where("Account_number", Session::getSession("Account_number"))->execute_query();
}

if (isset($_REQUEST['Country'])) {
    $res = $UserTable->update("Country", $_REQUEST['Country'])->where("Account_number", Session::getSession("Account_number"))->execute_query();
}
if ($res) {
    if (Session::referesh()) {
        justChangePath($URL->getView("Settings", "Settings"));
    } else {
        alert("Logout and Login Again", $URL->getView("Settings", "Settings"));
    }
}
