<?php
require "../../Classes/All.class.php";
require "../../include/include.php";
require "../../Logic/SignupLogic.php";

if (isset($_REQUEST['sirname'], $_REQUEST['firstname'], $_REQUEST['fathername'], $_REQUEST['DOB'], $_REQUEST['gender'])) {

    $AccountNumber = rand(0000, 99999);
    $Columns = [
        "Account_number",
        "Sirname",
        "Firstname",
        "Fathername",
        "Date_Of_Birth",
        "Gender",
        "Loan_requested",
        "Loan_taken"
    ];
    $values = array(
        $AccountNumber,
        $_REQUEST['sirname'],
        $_REQUEST['firstname'],
        $_REQUEST['fathername'],
        $_REQUEST['DOB'],
        $_REQUEST['gender'],
        "No",
        "No"
    );

    if (insertUser($Columns, $values)) {
        Session::setSession("tempAccount", $AccountNumber);
        justChangePath((new URL)->getView("Signup2", "Register"));
    } else {
        justAlert("Failed");
    }
}
