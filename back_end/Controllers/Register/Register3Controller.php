<?php
require "../../Classes/All.class.php";
require "../../include/include.php";
require "../../Logic/SignupLogic.php";

if (isset($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['confirmpassword'])) {

    if ($_REQUEST['password'] !== $_REQUEST['confirmpassword']) {
        justAlert("Password Does not Match!");
    }

    $Image = uploadProfileImage('pfp', "../../../storage/profiles");
    
    $DataSet = array(
        "Username" => $_REQUEST['username'],
        "Password" => $_REQUEST['password'],
        "Img_Path" => $Image,
        "Created" => true
    );

    if (!updateUser(Session::getSession("tempAccount"), $DataSet)) {
        justAlert("Update Failed");
    } else {
        justChangePath($URL->getView("SignupSuccess", "Register"));
    }
}
