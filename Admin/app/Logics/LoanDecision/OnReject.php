<?php

function delete_application(Table $LoanTable, $data)
{
    $res = $LoanTable->delete()->where("Application_ID", $data['application'])->execute_query();
    return $res;
}

function user_request_to_false(Table $UserTable, $data)
{
    $res = $UserTable->update("Loan_requested", 0)->where("Account_number", $data["account"])->execute_query();
    return $res;
}

function add_reject_notification(Table $NotificationTable, $data)
{
    $cols = ['Notification_For', 'Notification_Type', 'Notification'];
    $vals = [
        $data["account"],
        "Notification",
        "Your Loan Application {$data['application']} has been Reject , due to incorrect Documents!"
    ];
    $res = $NotificationTable->insert()->insert_columns($cols)->insert_values($vals)->execute_query();
    return $res;
}

function update_Users_Using($data)
{
    $LoanPackage = new Table("loan_packages", "Package_ID");
    $Packagedata = $LoanPackage->select()->where("Package_ID", $data['packageid'])->execute_query()[0];
    $UsersUsing = $Packagedata['Users_Using'] - 1;
    $LoanPackage->update("Users_Using", $UsersUsing)->where("Package_ID", $data['packageid'])->execute_query();
}
