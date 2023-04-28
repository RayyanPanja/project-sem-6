<?php
include_once "../../connection.php";
 
$Acc = $_SESSION['TempAcc'];

$Address = $_REQUEST['address'];
$Pin = $_REQUEST['pincode'];
$City = $_REQUEST['city'];
$State = $_REQUEST['state'];
$Country = $_REQUEST['country'];

if(isset($Address) && isset($City) && isset($Pin) && isset($State) && isset($Country)){
    $Update = "UPDATE `main` SET `Address` = '$Address', `City` = '$City', `Pin_Code` = $Pin , `State` = '$State', `Country` = '$Country' WHERE `main`.`Account_number` = $Acc;";
    $Result = mysqli_query($con,$Update);
    if($Update){
        header("Location: ../step3.php");
    }
}
?>