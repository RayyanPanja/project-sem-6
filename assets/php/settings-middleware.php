<?php
include_once "connection.php";

if (isset($_REQUEST['pin'])) {
    if ($_REQUEST['pin'] == $_SESSION['Password']) {
        header("Location: settings/ui.php");
    } else {
        alert("Password Incorrect", 'settings-psw.php');
    }
}
?>