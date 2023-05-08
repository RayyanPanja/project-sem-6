<?php
require "../../Classes/All.class.php";
require "../../include/include.php";
require "../../Logic/LoanLogic.php";

if (isset($_FILES['adharcard'], $_FILES['chequebook'], $_FILES['passbook'], $_FILES['passportimage'])) {

    $AllImages = array(
        "AdharCard" => $_FILES['adharcard'],
        "ChequeBook" => $_FILES['chequebook'],
        "Passbook" => $_FILES['passbook'],
        "Photo" => $_FILES['passportimage']
    );

    foreach ($AllImages as $key => $value) {
        if (!uploadImage($value, $key, "../../../storage/Docs/", $key)) {
            alert("Upload Failed", $URL->getView("Loan3", "Loan"));
        }
    }
    if (setLoanRequest(new Table('main', "Account_number"), Session::getSession("Account_number"))) {
        die;
        justChangePath($URL->getView("LoanSuccess", "Loan"));
    }
}
