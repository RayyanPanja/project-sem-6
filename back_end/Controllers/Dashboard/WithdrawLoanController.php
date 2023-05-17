<?php

require "../../Classes/All.class.php";
require "../../include/include.php";

if (isset($_REQUEST['loanApp'])) {
    $LoanTable = new Table("loan", "Application_ID");
    $res = $LoanTable->delete()->where("Application_ID", $_REQUEST['loanApp'])->and("Account_number", "=", $_REQUEST['user'])->execute_query();

    if ($res) {
        justChangePath($URL->getView("Dashboard", "Dashboard", "Loan"));
    }
}
