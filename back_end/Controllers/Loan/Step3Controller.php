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

    $uniqueId = uniqid(); // Generate the unique ID outside the loop

    foreach ($AllImages as $key => $value) {
        if (!uploadImage($value, $key, "../../../storage/Docs/", $key, $uniqueId)) {
            alert("Upload Failed", $URL->getView("Loan3", "Loan"));
        }
    }

    if (setLoanRequest(Session::getSession("Account_number"))) {
        if (!can_disable(Session::getSession("tempPackageID"))) {
            Session::referesh();
            justChangePath($URL->getView("LoanSuccess", "Loan"));
        } else {
            alert("Congratulations!! For Being the Last Borrower", $URL->getView("LoanSuccess", "Loan"));
        }
    }
}
