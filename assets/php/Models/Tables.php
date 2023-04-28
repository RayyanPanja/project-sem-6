<?php
include_once('../connection.php');
include_once('../../DBFuncs.php');
// All Tables
$USER_TABLE = fetchAllFrom($con, "main");
$TRANSACTION_TABLE = fetchAllFrom($con, "transaction");
$LOAN_TABLE = fetchAllFrom($con, "loan");
$LOAN_SCHEME_TABLE = fetchAllFrom($con, "schemes");
$NOTIFICATION_TABLE = fetchAllFrom($con, "notifications");

// All Tables
