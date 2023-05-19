<?php
require "../../Classes/All.class.php";
require "../../include/include.php";
require "../../Logic/ContactLogin.php";

if (empty($_REQUEST['email']) && empty($_REQUEST['message'])) {
    alert("Please Fill in Details First!!", $URL->getView("contact", "contact"));
}

if (!validateSubject($_REQUEST['subject'])) {
    alert("You Tried to Exploit DevTools", $URL->getView("contact", "contact"));
}

$DataSet = array();
$cid = rand(00000, 999999);
if (Session::Exists("Account_number")) {
    $Cols = [
        "Cid",
        "Email",
        "Subject",
        "Msg",
        "Status",
        "Account"
    ];
    $Vals = array(
        $cid,
        $_REQUEST['email'],
        $_REQUEST['subject'],
        $_REQUEST['message'],
        "Pending",
        Session::getSession("Account_number")
    );
} else {
    $Cols = [
        "Cid",
        "Email",
        "Subject",
        "Msg",
        "Status",
        "Account"
    ];
    $Vals = array(
        $cid,
        $_REQUEST['email'],
        $_REQUEST['subject'],
        $_REQUEST['message'],
        "Pending",
        Session::getSession("Account_number")
    );
}

if (insert_into_Contact($Cols, $Vals)) {
    justChangePath($URL->getView("ContactSuccess", "contact"));
} else {
    alert("Failed!!", $URL->getView("contact", "contact"));
}
