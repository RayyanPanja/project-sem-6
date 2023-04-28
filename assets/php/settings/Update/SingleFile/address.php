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
    <title>Updating Address....</title>
</head>

<body>
    <?php
    if (
        isset($_REQUEST['address']) ||
        isset($_REQUEST['zipcode']) ||
        isset($_REQUEST['city']) ||
        isset($_REQUEST['state']) ||
        isset($_REQUEST['counrty'])
    ) {
        $Address = $_REQUEST['address'];
        $ZipCode = $_REQUEST['zipcode'];
        $City = $_REQUEST['city'];
        $State = $_REQUEST['state'];
        $Country = $_REQUEST['country'];

        $myacc = $_SESSION['Account_number'];

        $DataSet = array(
            "Address" => $Address,
            "City" => $City,
            "Pin_Code" => $ZipCode,
            "State" => $State,
            "Country" => $Country
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