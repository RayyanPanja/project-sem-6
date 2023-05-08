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

if (Session::Exist("Account_number")) {
    $DataSet = array(
        "Cid" => rand(00000, 999999),
        "Email" => $_REQUEST['email'],
        "Subject" => $_REQUEST['subject'],
        "Msg" => $_REQUEST['message'],
        "Status" => "Pending",
        "Account" => Session::getSession("Account_number")
    );
} else {
    $DataSet = array(
        "Cid" => rand(00000, 999999),
        "Email" => $_REQUEST['email'],
        "Subject" => $_REQUEST['subject'],
        "Msg" => $_REQUEST['message'],
        "Status" => "Pending",
        "Account" => Session::getSession("Account_number")
    );
}

if (insert_into_Contact($DataSet)) {
    justChangePath($URL->getView("ContactSuccess", "contact"));
} else {
    alert("Failed!!", $URL->getView("contact", "contact"));
}
