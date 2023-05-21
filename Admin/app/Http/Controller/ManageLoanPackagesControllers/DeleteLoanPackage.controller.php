<?php

require "../../../Classes/autoload.php";

$req = new Request;

$Table = new Table("loan_packages", "Package_ID");

$res = $Table->delete()->where("Package_ID", $req->get("packageid"))->execute_query();


if ($res) {
    Helper::updateBankAmount();
    Helper::just_move(Route::getView("ManageLoan", 'ManageLoanPackages'));
}
?>