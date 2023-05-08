<?php
require "../../Classes/All.class.php";
require "../../include/include.php";

$acc = $_REQUEST['account'];
$psw = $_REQUEST['password'];


if (Auth::attempt($acc, $psw)) {
    header("Location: {$URL->getHomePage()}");
}
