<?php
require "../../Classes/All.class.php";
require "../../include/include.php";
require "../../Logic/LoanLogic.php";

if (isset($_REQUEST['account'])) {

    if (!Session::compareSession($_REQUEST['account'], "Account_number")) {
        alert("Account Number Does not Match...", $URL->getView("Loan", "Loan"));
    }
    if (!Session::compareSession($_REQUEST['username'], "Username")) {
        alert("Username Does not Match...", $URL->getView("Loan", "Loan"));
    }
    if (!Session::compareSession($_REQUEST['password'], "Password")) {
        alert("Password Incorrect", $URL->getView("Loan", "Loan"));
    }

    // Check if Loan is Requested From this Account......
    if (checkIfLoanRequested($_REQUEST['account'])) {
        $LoanTable = new Table("loan", "Application_ID");
        $AppID = rand(000000, 9999999);
        $DataSet = array(
            "Application_ID" => $AppID,
            "Account_number" => Session::getSession("Account_number"),
            "Name" => Session::getSession("Firstname"),
            "Email" => Session::getSession("Email"),
            "Contact" => Session::getSession("Contact"),
            "Loan_recovered" => boolval(false),
            "Decision" => "Pending"
        );
        if ($LoanTable->insertData($DataSet)) {
            Session::setSession("tempAppID", $AppID);
            justChangePath($URL->getView("Loan2", "Loan"));
        }
    } else {
        alert("Loan Already Requested", $URL->getView("Dashboard", "Dashboard"));
    }
}
