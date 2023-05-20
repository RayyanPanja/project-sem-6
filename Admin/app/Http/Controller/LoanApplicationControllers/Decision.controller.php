<?php
require "../../../Classes/autoload.php";
$req = new Request;

if ($req->Exists("decision")) {
    require "../../../Logics/LoanDecision.php";
    switch ($req->get("decision")) {

        case 'Reject':
            if (!on_reject($req)) {
                Helper::alert_and_move("REJECTION FAILED!", Route::getView("Loan", "LoanApp"));
            } else {
                Helper::just_move(Route::getView("Loan", "LoanApp"));
            }
            break;

        case 'Approve':
            if (!on_approve($req)) {
                Helper::alert_and_move("Approval FAILED!", Route::getView("Loan", "LoanApp"));
            } else {
                Helper::just_move(Route::getView("Loan", "LoanApp"));
            }

        default:
            Helper::alert_and_move("FAILED", Route::getView("Loan", "LoanApp"));
            break;
    }
}
