<?php
include('../../../../connection.php');
include('../../../../../DBFuncs.php');

if (isset($_REQUEST['password'], $_REQUEST['confirmpassword'])) {
    if ($_REQUEST['password'] === $_REQUEST['confirmpassword']) {
        $Data = array(
            "Password" => $_REQUEST['password']
        );
        if (UpdateTableData($con, "main", $Data, "Account_number", $_SESSION['Account_number'])) {
            $UserTable = fetchAllFrom($con, "main");
            $User = fetchWhere($UserTable, "Account_number", $_SESSION['Account_number'])['data'];
            refreshUserSessions($User);
            alert("Password Changed Successfully!!!", "../../../ui.php");
        } else {
            alert("Cant Update Password!!", "ui.php");
        }
    } else {
        alert("Passwords Does not Match!", 'ui.php');
    }
}
