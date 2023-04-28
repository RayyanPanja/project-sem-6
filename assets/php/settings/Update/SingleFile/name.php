<?php
include('../../../connection.php');
include('../../../Models/Tables.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating Name....</title>
</head>

<body>
    <?php
    if (isset($_REQUEST['sirname']) || isset($_REQUEST['fathername']) || isset($_REQUEST['firstname'])) {
        $Sirname = $_REQUEST['sirname'];
        $Firstname = $_REQUEST['firstname'];
        $Fathername = $_REQUEST['fathername'];

        $myacc = $_SESSION['Account_number'];

        $DataSet = array(
            "Sirname" => $Sirname,
            "Firstname" => $Firstname,
            "Fathername" => $Fathername
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