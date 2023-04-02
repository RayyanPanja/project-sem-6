<?php
include "../../connection.php";
 
$MyAccount = $_SESSION['Account'];
$MyPassword = $_SESSION['Password'];
$MyName = $_SESSION['Name'];

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