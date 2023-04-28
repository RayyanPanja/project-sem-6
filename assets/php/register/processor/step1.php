<?php
include_once "../../connection.php";

$firstname = $_REQUEST['sirname'];
$name = $_REQUEST['yourname'];
$fathername = $_REQUEST['fathername'];
$dob = $_REQUEST['dob'];
$gender = $_REQUEST['gender'];

if (isset($name) && isset($firstname) && isset($fathername)) {
    $account = rand(0000, 999999);
    $Insert = "INSERT INTO `main` (`Account_number`, `Sirname`, `Firstname`, `Fathername`, `Date Of Birth`,`Gender` ,`Loan_taken`, `Loan_requested`, `Date_Created`) 
    VALUES ($account, '$firstname', '$name', '$fathername', '$dob', '$gender','No', 'No', current_timestamp());";
    $Result = mysqli_query($con, $Insert);
    if ($Result) {
        $_SESSION['TempAcc'] = $account;
        header("Location: ../step2.php");
    }
}
