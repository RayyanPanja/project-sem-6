<?php
include "../connection.php";
session_start();
$_SESSION["Account"];
$_SESSION['Name'];
$_SESSION['Password'];
session_destroy();
header("Location: ../../../index.php")
?>
