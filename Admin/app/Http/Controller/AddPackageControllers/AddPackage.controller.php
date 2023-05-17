<?php
require "../../../Classes/autoload.php";

$req = new Request;

Helper::pa($req->all());

if ($req->Exists("PackageName")) {

    $PackageTable = new Table("loan_packages", "Package_ID");

    $col = [
        "Package_ID",
        "Package_Name",
        "Package_Amount",
        "Sponsor",
        "Max_Users",
        "Interest",
        "Loan_Term",
        "Terms"
    ];
    $val = [
        rand(0000000000, 99999999999),
        $req->get("PackageName"),
        $req->get("PackageAmount"),
        $req->get("Sponsor"),
        $req->get("MaxUsers"),
        $req->get("Interest"),
        $req->get("LoanTerm"),
        str_replace("--Terms--and--Conditions--", "", $req->get("Terms")),
    ];

    $res = $PackageTable->insert()->insert_columns($col)->insert_values($val)->execute_query();
    if ($res) {
        Helper::just_move(Route::getView("LoanPackage", "LoanPackage"));
    }
}
