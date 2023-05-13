<?php
require "../../Classes/All.class.php";
require "../../include/include.php";

$acc = $_REQUEST['account'];
$psw = $_REQUEST['password'];


if (Auth::check_if_Banned($acc)) {
    alert("Your Account Has Been Blocked , Contact Your Bank For Futher Details...", $URL->getHomePage());
} else {
    if (Auth::attempt($acc, $psw)) {
        justChangePath($URL->getHomePage());
    }else{
        justAlert("FAILED");
    }
}
