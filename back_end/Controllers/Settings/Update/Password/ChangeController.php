<?php

require "../../../../Classes/All.class.php";
require "../../../../include/include.php";
require "../../../../Logic/ChangePassword.php";

$Password = $_REQUEST['password'];
$ConfirmPassword = $_REQUEST['confirmpassword'];


if (!check_if_passwords_equal($Password, $ConfirmPassword)) {
    alert("Passwords Does not Match", Route::getView("Change", "Settings/Password"));
    die;
}

if (!update_password($Password)) {
    alert("Password Update Failed", Route::getView("Change", "Settings/Password"));
    die;
}

// Get the current date and time
$currentDateTime = date('Y-m-d H:i:s');

// Create the message with the current date and time
$message = "Password has been changed!! on Date: $currentDateTime";


$cols = [
    "Notification_For",
    "Notification_Type",
    "Notification"
];
$vals = [
    Session::getSession("Account_number"),
    "Notification",
    "Password Has Been Changed!! on Date: {$message} , if you Dont Know About this Contact Your Bank!"
];

if (!add_notification($cols, $vals)) {
    alert("Notification Failed", Route::getView("Change", "Settings/Password"));
    die;
}

if (Session::referesh()) {
    justChangePath(Route::getView("Settings", "Settings"));
} else {
    alert("Referesh Failed", Route::getView("Change", "Settings/Password"));
    die;
}
