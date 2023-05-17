<?php
require "LoanDecision/OnReject.php";
require "LoanDecision/OnApprove.php";

function on_reject(Request $request)
{
    $data = $request->all();

    $LoanTable = new Table("loan", "Application_ID");
    $UserTable = new Table("main", "Account_number");
    $NotificationTable = new Table("notifications", "id");
    // Delete Application
    $res = delete_application($LoanTable, $data);
    if (!$res) {
        Helper::just_alert("Application Deletion Failed");
    }

    // User Request to False
    $res1 = user_request_to_false($UserTable, $data);
    if (!$res1) {
        Helper::just_alert("User Loan Request Failed");
    }
    // Add Notification
    $res2 = add_reject_notification($NotificationTable, $data);
    if (!$res2) {
        Helper::just_alert("Notification Failed");
    }
    return true;
}

function on_approve(Request $request)
{
    $data = $request->all();
    $LoanTable = new Table("loan", "Application_ID");
    $UserTable = new Table("main", "Account_number");
    $NotificationTable = new Table("notifications", "id");

    // Update Loan Application
    $res = update_application($LoanTable, $data);
    if (!$res) {
        Helper::just_alert("Application Update Failed");
    }

    // User has Taken Loan to True
    $res1 = user_taken_to_true($UserTable, $data);
    if (!$res1) {
        Helper::just_alert("User Loan Taken Update Failed");
    }

    // Add Amount to User Account
    $res2 = add_balance_to_user($UserTable, $data);
    if (!$res) {
        Helper::just_alert("Balance could not be Transfered");
    }

    // Add Notification
    $res3 = add_approve_notification($NotificationTable, $data);
    if (!$res3) {
        Helper::just_alert("Notification Failed Failed");
    }

    return true;
}
