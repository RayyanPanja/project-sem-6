<script>
    const Return = (msg) => {
        alert(msg)
        window.location.assign('../package.php')
    }
</script>

<?php
include "../../connection.php";
 
$Account = $_SESSION['Account'];
$Password = $_SESSION['Password'];

$ApplicationID = $_SESSION['TempAppID'];

$CONFIRM = $_REQUEST['CONFIRM'];
$PackageID = $_REQUEST['package-id'];

if ($CONFIRM === "CONFIRM" && isset($PackageID)) {
    // Global Scope Variables......
    $PackageName;
    $PackageAmount;
    $MaxUsers;
    $UsersUsing;
    // Global Scope Variables......Ends

    // FETCHING ALL DATA FROM SCHEMES TABLE.........
    $Fetch = "SELECT * FROM `schemes` WHERE `Scheme_ID` = $PackageID;";
    $Result = mysqli_query($con, $Fetch);
    if (mysqli_num_rows($Result) > 0) {
        while ($data = mysqli_fetch_assoc($Result)) {
            $PackageName = $data['Scheme_Name'];
            $PackageAmount = $data['Package'];
            $UsersUsing = $data['Users_Using'];
            $MaxUsers = $data['Max_Users'];
        }
    } else {
        echo "<script> Return('InValid Package....'); </script>";
    }
    // FETCHING ALL DATA FROM SCHEMES TABLE.........Ends

    if ($UsersUsing <= $MaxUsers) {
        // UPDATING DATA IN LOAN TABLE.....
        $Update = "UPDATE `loan` SET 
        `Debt` = '$PackageAmount', 
        `Package_ID` = '$PackageID', 
        `Package_Name` = '$PackageName', 
        `Package_Amount` = '$PackageAmount' WHERE `loan`.`Application_ID` = $ApplicationID;";
        $UResult = mysqli_query($con, $Update);
        // UPDATING DATA IN LOAN TABLE.....Ends

        if ($UResult) {
            // UPDATE SCHEMES TABLE......
            $inc = $UsersUsing + 1;
            $UpdateScheme = "UPDATE `schemes` SET
        `Users_Using` = $inc WHERE `Scheme_ID` = $PackageID";
            $UpdateSchemeResult = mysqli_query($con, $UpdateScheme);
            // UPDATE SCHEMES TABLE......Ends
            if ($UpdateSchemeResult) {
                // UPDATE MAIN TABLE......
                $UpdateMain = "UPDATE `main` SET
        `Loan_requested` = 'Yes' WHERE `Account_number` = $Account";
                $UpdateMainResult = mysqli_query($con, $UpdateMain);
                // UPDATE MAIN TABLE......Ends
                if ($UpdateMainResult) {
                    header("Location: ../docs.php");
                }
            }
        }
    } else {
        echo "<script>Return('Max Users Reached..');</script>";
    }
}
?>