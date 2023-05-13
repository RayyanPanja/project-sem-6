<?php
require "../../Classes/All.class.php";
require "../../include/include.php";
require "../../Logic/SignupLogic.php";

if (isset($_REQUEST['address'], $_REQUEST['email'], $_REQUEST['tel-country-code'], $_REQUEST['contact'])) {

    $AddressArray = seperateAddress($_REQUEST['address']);
    $CityArray = seperateCityandPin($AddressArray[1]);

    $DataSet = array(
        "Address" => $AddressArray[0],
        "City" => $CityArray[0],
        "Pin_Code" => $CityArray[1],
        "State" => $AddressArray[2],
        "Country" => $AddressArray[3],
        "Email" => $_REQUEST['email'],
        "Contact" => trim($_REQUEST['contact'], " ")
    );

    if (updateUser(Session::getSession('tempAccount'), $DataSet)) {
        justChangePath((new URL)->getView("Signup3", "Register"));
    } else {
        justAlert("Update Failed");
    }
}
