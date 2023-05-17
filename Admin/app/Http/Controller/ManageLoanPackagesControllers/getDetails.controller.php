<?php
require "../../../Classes/autoload.php";

Helper::pa($_REQUEST);

Session::setSession("tempPackage", $_REQUEST['PackageID']);

Helper::just_move(Route::getView("MoreDetails", "ManageLoanPackages"));
?>