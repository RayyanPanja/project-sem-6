<?php
include_once('../../../../connection.php');
include_once('../../../../Models/Tables.php');

$RecoveryTable = fetchAllFrom($con, "recovery");

if (isset($_REQUEST['numkey'])) {
    $NumKey = fetchWhere($RecoveryTable, "For_Account", $_SESSION['Account_number'], "Recovery_Number")['data'];
    if (equals($NumKey, $_REQUEST['numkey'],boolval(true))) {
        header("Location: ../UpdatePassword/ui.php");
    } else {
        alert("Key Does not Match", 'ui.php');
    }
}

if (isset($_REQUEST['wordkey'])) {
    $WordKey = fetchWhere($RecoveryTable, "For_Account", $_SESSION['Account_number'], "Recovery_Word")['data'];
    if (equals($WordKey, $_REQUEST['wordkey'])) {
        header("Location: ../UpdatePassword/ui.php");
    } else {
        alert("Key Does not Match", 'ui.php');
    }
}
