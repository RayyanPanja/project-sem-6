<?php
include_once "../../../connection.php";
$retry = boolval(false);
if (isset($_REQUEST['password'])) {
    $psw = $_REQUEST['password'];
    if ($psw === $_SESSION['password']) {
        header("Location: UpdatePassword/ui.php");
    } else {
        $retry = boolval(true);
        alert("Password Incorrect", "Recognize.php");
    }
}
