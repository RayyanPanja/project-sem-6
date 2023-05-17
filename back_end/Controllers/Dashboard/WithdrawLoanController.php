<?php

require "../../Classes/All.class.php";
require "../../include/include.php";

if (isset($_REQUEST['loanApp'])) {
    $LoanTable = new Table("loan", "Application_ID");
    $res = $LoanTable->delete()->where("Application_ID", $_REQUEST['loanApp'])->and("Account_number", "=", $_REQUEST['user'])->execute_query();

    if ($res) {
        $UserTable = new Table("main", "Account_number");
        $res1 = $UserTable->update("Loan_Requested", 0)->where("Account_number", Session::getSession("Account_number"))->execute_query();
        if ($res1) {
            justChangePath($URL->getView("Dashboard", "Dashboard", "Loan"));
        }
    }
}
