<?php
require "../../../Classes/autoload.php";
$PackageTable = new Table("loan_packages", "Package_ID");

$req = new Request;

if (Request::Exists("terms")) {
    $res =  $PackageTable->update("Terms", $req->get("terms"))->where("Package_ID", $req->get("packageid"))->execute_query();
    if ($res) {
        Helper::just_move(Route::getView("MoreDetails", "ManageLoanPackages"));
    }
}
