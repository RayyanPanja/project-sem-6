<?php
require "../../../Classes/autoload.php";
$PackageTable = new Table("loan_packages", "Package_ID");

$req = new Request;

if (Request::Exists("status")) {
    $res = boolval(false);
    if ($req->get("status") === "Activate") {
        $res =  $PackageTable->update("Status", 1)->where("Package_ID", $req->get("packageid"))->execute_query();
    } else {
        $res =  $PackageTable->update("Status", 0)->where("Package_ID", $req->get("packageid"))->execute_query();
    }
    if ($res) {
        Helper::just_move(Route::getView("MoreDetails", "ManageLoanPackages"));
    }
}
