<!-- Using as Package -->
<?php
include "func.php";
$server = "localhost";
$user = "root";
$psw = "";
$database = "bank";

$con = mysqli_connect($server, $user, $psw, $database);
if (!$con) {
    die("Connection Not Established" . mysqli_connect_errno());
}
$BANKNAME = "WeBank";
