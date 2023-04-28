<?php
include_once("../connection.php");

$GetID = $_REQUEST['adminid'];
$GetPassword = $_REQUEST['password'];

if (isset($GetID, $GetPassword)) {
    $fetch = "SELECT * FROM `admin` WHERE `Admin_ID` = $GetID";
    $fetchResult = mysqli_query($con, $fetch);
    if (mysqli_num_rows($fetchResult) > 0) {

        $AdminID;
        $AdminPassword;
        $AdminDesignation;
        $AdminName;

        while ($data = mysqli_fetch_assoc($fetchResult)) {
            $AdminID = $data['Admin_ID'];
            $AdminPassword = $data['Admin_Password'];
            $AdminDesignation = $data['Designation'];
            $AdminName = $data['Admin_Name'];
        }

        if ($GetID === $AdminID && $GetPassword === $AdminPassword) {
            Login($AdminID, $AdminPassword, $AdminDesignation, $AdminName);
        } else {
            $_SESSION['ErrorPassword'] = "Password Incorrect";
            header("Location: ../../../index.php");
        }
    } else {
        $_SESSION['ErrorAccount'] = "Account Does not Exist ";
        header("Location: ../../../index.php");
    }
}
