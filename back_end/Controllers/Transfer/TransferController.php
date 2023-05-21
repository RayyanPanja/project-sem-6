<?php
require "../../Classes/All.class.php";
require "../../include/include.php";
require "../../Logic/TransferLogic.php";

if (Request::Exists("Account") && Request::Exists("Amount") && Request::Exists("password")) {
    $req = new Request;

    if (!validate_password($req->get("password"))) {
        alert("Password Incorrect", Route::getView("Transfer", "Transfer"));
        die;
    }

    $Sender = fetch_user(Session::getSession("Account_number"));
    $Receiver = fetch_user($req->get("Account"));

    if (!validate_amount($Sender)) {
        alert("Insufficient Balance", Route::getView("Transfer", "Transfer"));
        die;
    }

    // Try Generating Reward.......................
    generate_reward($req->get("Amount"), $Sender, $req);

    // Subtract Amount From User Account................................
    if (!deduct_amount_from($Sender, $req->get("Amount"), $req)) {
        alert("Amount Deduction Failed", Route::getView("Transfer", "Transfer"));
        die;
    }

    // Add Amount From User Account................................
    if (!add_amount_to($Receiver, $req->get("Amount"))) {
        alert("Transfer Failed", Route::getView("Transfer", "Transfer"));
        die;
    }

    // Add Notification For Sender Account................................
    $senderVals = [
        $Sender['Account_number'],
        "Notification",
        "Rs.{$req->get('Amount')}/- Deducted From Your Account: {$Sender['Account_number']} , Transfered to {$Receiver['Username']}"
    ];
    if (!add_notification($senderVals)) {
        alert("Notification For Sender Failed", Route::getView("Transfer", "Transfer"));
        die;
    }

    // Add Notification For Receiver Account................................
    $receiverVals = [
        $Receiver['Account_number'],
        "Notification",
        "Rs.{$req->get('Amount')}/- Transfered toYour Account: {$Receiver['Account_number']} , Transfered From {$Sender['Username']}"
    ];

    if (!add_notification($receiverVals)) {
        alert("Notification For Receiver Failed", Route::getView("Transfer", "Transfer"));
        die;
    }

    // Register Transaction in DB................................
    if (log_transaction($Sender, $Receiver, $req->get("Amount"), $req->get("Note"))) {
        if ($req->get("Reward") != "") {
            alert("Reward Claimed , Transfer Successfull!", Route::getView("TransferSucess", "Transfer"));
            die;
        } else {
            alert("Transfer Successfull!", Route::getView("TransferSucess", "Transfer"));
            die;
        }
    }
}
