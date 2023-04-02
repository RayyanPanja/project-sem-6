<?php
include "../connection.php";
 
// Init ->

$token;

$Account;
$Password;
$Sirname;
$Name;
$FatherName;
$Email;
$Image;

$message;
$code;
$reason;

// GET ->
$GetAccount = $_REQUEST['account'];
$GetPassword = $_REQUEST['password'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging in.....</title>
</head>

<body>
    <div class="loader-wrapper">
        <div class="loader"></div>
        <h1>Please Wait Logging in.....</h1>
    </div>
    <?php
    if (!empty($GetAccount) && !empty($GetPassword)) {
        // Get Data From Main Table if exist else search deletedaccounts table....
        $GetMain = "SELECT * FROM main WHERE `Account_number` = $GetAccount";
        $FetchMain = mysqli_query($con, $GetMain);
        if (mysqli_num_rows($FetchMain) > 0) {
            while ($data = mysqli_fetch_assoc($FetchMain)) {
                $Account = $data['Account_number'];
                $Password = $data['Password'];
                $Sirname = $data['Sirname'];
                $Name = $data['Firstname'];
                $FatherName = $data['Fathername'];
                $Email = $data['Email'];
                $Image = $data['Img_Path'];
            }
            $token = true;
        } else {
            $GetDeleted = "SELECT * FROM `deletedaccounts` WHERE `Account_number` = $GetAccount";
            $FetchDeleted = mysqli_query($con, $GetDeleted);
            if (mysqli_num_rows($FetchDeleted) > 0) {
                while ($data = mysqli_fetch_assoc($FetchDeleted)) {
                    $message = $data['msg'];
                    $reason = $data['Reason'];
                    $code = $data['Reason_Code'];
                }
    ?>
                <script>
                    alert("<?php echo $message; ?>\n<?php echo "Reason: " . $reason; ?>\n<?php echo "CODE: " . $code; ?>");
                    location.assign("../../../index.php");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("Account Does not Exist....");
                    location.assign("../../../index.php");
                </script>
    <?php
            }
        }
        // Get Data From Main Table if exist else search deletedaccounts table....ENds
    }
    ?>
    <script>
        <?php
        // Compare if GetAccount == Account & GetPassword == Password Are Same to Login....
        if ($token == true) {
            if ($GetAccount == $Account) {
                if ($GetPassword == $Password) {
                    Login($Account, $Password, $Email, $Sirname, $Name, $FatherName, $Image);
                } else {
        ?>
                    alert("Password Incorrect....")
                    location.assign("../../../index.php");
        <?php
                }
            }
        }
        // Compare if GetAccount & GetPassword Are Same to Login....Ends
        ?>
    </script>
</body>

</html>