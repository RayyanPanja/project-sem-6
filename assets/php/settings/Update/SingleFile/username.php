<?php
include_once('../../../connection.php');
include_once('../../../Models/Tables.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating Username....</title>
</head>

<body>
    <?php
    if (isset($_REQUEST['username'])) {
        $Username = $_REQUEST['username'];

        $myacc = $_SESSION['Account_number'];

        $DataSet = array(
            "Username" => $Username
        );

        if (UpdateTableData($con, "main", $DataSet, "Account_number", $myacc)) {
            $UpdatedUser = fetchWhere($USER_TABLE, "Account_number", $myacc);
            if (refreshUserSessions($UpdatedUser['data'])) {
                Write($UpdatedUser['data']);
                alert("Profile Updated...", "../../ui.php");
            }
        }
    }
    ?>
</body>

</html>