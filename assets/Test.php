<?php
include('php/connection.php');
include('DBFuncs.php');

$UserTable = fetchAllFrom($con, "main");
$User = fetchWhere($UserTable, "Account_number", $_SESSION['Account_number'])['data'];
refreshUserSessions($User);
alert("RESET...",'php/settings/ui.php');
