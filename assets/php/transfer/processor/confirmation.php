<?php
include_once "../../connection.php";
 
$MyAccount = $_SESSION['Account_number'];
$MyPassword = $_SESSION['Password'];
$MyName = $_SESSION['Firstname'];

$Account = $_REQUEST['account'];
$Amount = $_REQUEST['amount'];
$Note = $_REQUEST['note'];

if (isset($Account) && isset($Amount) && isset($Note)) {
    $_SESSION['Amount'] = $Amount;
    $_SESSION['HisAccount'] = $Account;
    $_SESSION['Note'] = $Note;
    header("Location: ../ui.php");
}
?>