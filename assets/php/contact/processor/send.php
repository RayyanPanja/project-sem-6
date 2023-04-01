<?php
include "../../connection.php";

$GetEmail = $_REQUEST['email'];
$GetSubject = $_REQUEST['subject'];
$GetMessage = $_REQUEST['message'];

$user_ip = $_SERVER['REMOTE_ADDR'];

$INSERT = "INSERT INTO `comment` 
(`Email`,`Subject`, `Msg`, `Status`, `Time`, `Date`) 
VALUES ('$GetEmail','$GetSubject','$GetMessage','Pending', current_timestamp(), current_timestamp());";

$Res = mysqli_query($con, $INSERT);

if ($Res) {
    header("Location: ../response.php");
}
