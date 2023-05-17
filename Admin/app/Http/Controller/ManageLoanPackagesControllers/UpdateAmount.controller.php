<?php
require "../../../Classes/autoload.php";
$PackageTable = new Table("loan_packages", "Package_ID");

$req = new Request;

if (Request::Exists("amount")) {
    if ($req->get("amount") !== $req->get("confirmamount")) {
        Helper::alert_and_move("Amount Differs!", Route::getView("MoreDetails", "ManageLoanPackages"));
    }

    $res =  $PackageTable->update("Package_Amount", $req->get("amount"))->where("Package_ID", $req->get("packageid"))->execute_query();
    if ($res) {
        Helper::just_move(Route::getView("MoreDetails", "ManageLoanPackages"));
    }
}
