<?php
require "../../../Classes/autoload.php";

Session::setSession("tempPackage", $_REQUEST['PackageID']);

Helper::just_move(Route::getView("MoreDetails", "ManageLoanPackages"));
?>