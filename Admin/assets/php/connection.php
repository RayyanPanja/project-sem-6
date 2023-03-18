<?php
session_start();
include "func.php";
$BANKNAME = "Web Wallet";
$Details = array('localhost', 'root', '', 'bank');
$con = mysqli_connect($Details[0], $Details[1], $Details[2], $Details[3]);
if (!$con) {
    die("Connection Failed" . mysqli_connect_error());
}
