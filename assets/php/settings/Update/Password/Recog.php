<?php
include_once "../../../connection.php";
if (isset($_REQUEST['password'])) {
    $psw = $_REQUEST['password'];
    if ($psw === $_SESSION['Password']) {
        header("Location: UpdatePassword/ui.php");
    } else {
        $_SESSION['temp_bool'] = boolval(true);
        alert("Password Incorrect", "Recognize.php");
    }
}
