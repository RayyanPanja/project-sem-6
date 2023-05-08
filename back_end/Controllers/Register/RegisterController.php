<?php
require "../../Classes/All.class.php";
require "../../include/include.php";
require "../../Logic/SignupLogic.php";

if (isset($_REQUEST['sirname'], $_REQUEST['firstname'], $_REQUEST['fathername'], $_REQUEST['DOB'], $_REQUEST['gender'])) {

    $AccountNumber = rand(0000, 99999);
    $DataSet = array(
        "Account_number" => $AccountNumber,
        "Sirname" => $_REQUEST['sirname'],
        "Firstname" => $_REQUEST['firstname'],
        "Fathername" => $_REQUEST['fathername'],
        "Date_Of_Birth" => $_REQUEST['DOB'],
        "Gender" => $_REQUEST['gender'],
        "Loan_requested" => "No",
        "Loan_taken" => "No",
    );

    if (insertUser($DataSet)) {
        Session::setSession("tempAccount", $AccountNumber);
        justChangePath((new URL)->getView("Signup2", "Register"));
    } else {
        justAlert("Failed");
    }
}
