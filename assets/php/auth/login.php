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

        // Global Vars...
        $getMainObject;
        $getDeletedObject;
        $dataMain;
        $dataDeletedAcc;
        // Global Vars...Ends

        $mainTable = fetchAllFrom($con, "main");
        $getMainObject = searchData($mainTable, "Account_number", $_REQUEST['account']);
        if ($getMainObject['boolean'] === boolval(true)) {
            $dataMain = $getMainObject['data'];

            if ($dataMain['Account_number'] === $_REQUEST['account'] && $dataMain['Password'] === $_REQUEST['password']) {
                Login($dataMain);
            }
        } else {
            $deletedAcc = fetchAllFrom($con, "deletedAccounts");
            $getDeletedObject = searchData($deletedAcc, "Account_number", $_REQUEST['account']);
            if ($getDataObject['boolean'] === boolval(true)) {
                $dataDeletedAcc = $getDeletedObject['data'];
                alert("Your Account Has Been Deleted For {$dataDeletedAcc['Reason']} -- CODE: {$dataDeletedAcc['Code']}", "../../../index.php");
            } else {
                alert("Account Could not be Found", "../../../index.php");
            }
        }
    } else {
        alert("Account Doesn't Exist!!!", '../../../index.php');
    }

    ?>
</body>

</html>