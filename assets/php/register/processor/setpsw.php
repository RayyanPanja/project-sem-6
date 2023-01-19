<?php
include "../../connection.php";
session_start();
$Acc = $_SESSION['TempAcc'];

$Password = $_REQUEST['password1'];
$Password2 = $_REQUEST['password2'];

if(isset($Password,$Password2) && $Password === $Password2){
    $Update = "UPDATE `main` SET `Password` = '$Password' WHERE `Account_number` = $Acc;";
    $Result = mysqli_query($con,$Update);
    if($Result){
        header("Location: ../step4.php");
    }
}else{
    ?>
    <script>
        alert("Password Not Matching OR Password is Empty") 
        location.assign("../setpsw.php");
    </script>
    <?php
}
?>