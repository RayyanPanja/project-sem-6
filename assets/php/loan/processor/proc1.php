<?php
include "../../connection.php";
 
$Account = $_SESSION['Account'];
$SirName = $_SESSION['Sirname'];
$Name = $_SESSION['Name'];
$FatherName = $_SESSION['Father'];
$Password = $_SESSION['Password'];

$ACC = $_REQUEST['account'];
$PSW = $_REQUEST['password'];
$Email = $_REQUEST['email'];
$Contact = $_REQUEST['contact'];

if (isset($ACC) && isset($PSW)) {
    if ($ACC == $Account && $PSW == $Password) {
        $ApplicationID = rand(000000, 9999999);

        $INSERT = "INSERT INTO `loan` (`Application_ID`, `Account_number`,`Name`,`Email`, `Contact`,`Loan_recovered`, `Decision`,`Date_Loan_Req`) 
        VALUES ($ApplicationID, $Account,'$Name','$Email', '$Contact', '0', 'Pending', current_timestamp());";
        $Result = mysqli_query($con, $INSERT);
        if ($Result) {
            $_SESSION['TempAppID'] = $ApplicationID;
            header("Location: ../package.php");
        }
    } else { ?>
        <script>
            alert("Account OR Password Incorrect")
            window.location.assign("../ui.php");
        </script>
    <?php }
} else { ?>
    <script>
        alert("Enter Account Number And Password...")
        window.location.assign("../ui.php");
    </script>
<?php } ?>