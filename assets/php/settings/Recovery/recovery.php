<?php
// INSERT RECOVERY....
include('../../connection.php');
include('../../../DBFuncs.php');

if (isset($_REQUEST['number'], $_REQUEST['word'])) {
    $InsertDataSet = array(
        "For_Account" => $_SESSION['Account_number'],
        "Recovery_Number" => $_REQUEST['number'],
        "Recovery_Word" => $_REQUEST['word']
    );
    if (insertTableData($con, "recovery", $InsertDataSet)) {
        $UpdateDataSet = array(
            "Recovery" => boolval(true)
        );
        UpdateTableData($con, "main", $UpdateDataSet, "Account_number", $_SESSION['Account_number']);

        $UserTable = fetchAllFrom($con, "main");
        $User = fetchWhere($UserTable, "Account_number", $_SESSION['Account_number'])['data'];
        if (refreshUserSessions($User)) {
            alert("Recovery Details Set Successfully", "../ui.php");
        }
    } else {
        alert("Recovery Details Cant be Set", "../ui.php");
    }
}
