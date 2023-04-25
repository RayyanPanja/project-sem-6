<?php
include('../connection.php');
include_once('../../Fetched.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging in...</title>
</head>

<body>
    <?php
    if (isset($_REQUEST['account']) && isset($_REQUEST['password'])) {
        $mainTable = fetchAllFrom($con, "main");
        $Data = searchData($mainTable, "Account_number", $_REQUEST['account']);
        if ($Data['boolean'] !== boolval(false)) {
            $mainData = $Data['data'];
            if ($mainData['Account_number'] == $_REQUEST['account']) {
                if ($mainData['Password'] == $_REQUEST['password']) {
                    if ($mainData['Blocked'] == boolval(false)) {
                        Login($mainData);
                    } else {
                        alert('Your Account has been Blocked , please Contact you Bank.', '../../../index.php');
                    }
                } else {
                    alert("Password Incorrect", '../../../index.php');
                }
            } else {
                alert("Account Does not Match", '../../../index.php');
            }
        } else {
            // Checking Deleted Accounts Table....
            $deletedAccTable = fetchAllFrom($con, "deletedaccounts");
            $Data = searchData($deletedAccTable, "Account_number", $_REQUEST['account']);
            if ($Data['boolean'] !== boolval(false)) {
                $deletedData = $Data['data'];
                alert("Your Account has been Suspended , Because: {$deletedData['Reason']}", '../../../index.php');
            }
        }
    }
    ?>
</body>

</html>