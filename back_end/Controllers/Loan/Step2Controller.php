<?php
require "../../Classes/All.class.php";
require "../../include/include.php";
require "../../Logic/LoanLogic.php";

if (isset($_REQUEST['package_id'], $_REQUEST['terms'], $_REQUEST['confirm'])) {

    if ($_REQUEST['confirm'] === "CONFIRM") {
        if (updateLoanData($_REQUEST['package_id'])) {
            Session::setSession("tempPackageID",$_REQUEST['package_id']);
            justChangePath($URL->getView("Loan3", "Loan"));
        }
    } else {
        alert("confirm should be in Uppercase!!", $URL->getView("Loan2", "Loan"));
    }
}
