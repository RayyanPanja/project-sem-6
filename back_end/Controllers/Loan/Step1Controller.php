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
        $cols = [
            "Application_ID",
            "Account_number",
            "Name",
            "Email",
            "Contact",
            "Loan_recovered",
            "Decision"
        ];
        $vals = array(
            $AppID,
            Session::getSession("Account_number"),
            Session::getSession("Firstname"),
            Session::getSession("Email"),
            Session::getSession("Contact"),
            0,
            "Pending"
        );
        if ($LoanTable->insert()->insert_columns($cols)->insert_values($vals)->execute_query()) {
            Session::setSession("tempAppID", $AppID);
            justChangePath($URL->getView("Loan2", "Loan"));
        }
    } else {
        alert("Loan Already Requested", $URL->getView("Dashboard", "Dashboard"));
    }
}
