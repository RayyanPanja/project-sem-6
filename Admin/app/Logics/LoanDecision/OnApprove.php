<?php

function update_application(Table $LoanTable, $data)
{
    $package = get_Package_Data($data['packageid']);

    $debt = get_Interest_Ammount($data['amount'], $package['Interest'], $package['Loan_Term']);

    $res = $LoanTable->update("Decision", "Approved")->where("Application_ID", $data['application'])->execute_query();
    if (!$res) {
        return false;
    }

    $res2 = $LoanTable->update("Decision_By", Session::getSession("Admin_Name"))->where("Application_ID", $data['application'])->execute_query();
    if (!$res2) {
        return false;
    }

    $res3 = $LoanTable->update("Debt", $debt + $data['amount'])->where("Application_ID", $data['application'])->execute_query();
    if (!$res3) {
        return false;
    }
    return true;
}


function user_taken_to_true(Table $UserTable, $data)
{
    $res = $UserTable->update("Loan_taken", true)->where("Account_number", $data["account"])->execute_query();
    return $res;
}


function add_balance_to_user(Table $UserTable, $data)
{
    $User = get_User_Data($data['account']);
    $Amount = $User['Amount'] + $data['amount'];

    return  $UserTable->update("Amount", $Amount)->where("Account_number", $data['account'])->execute_query();
}

function add_approve_notification(Table $NotificationTable, $data)
{
    $cols = ['Notification_For', 'Notification_Type', 'Notification'];
    $vals = [
        $data["account"],
        "Notification",
        "Your Loan Application {$data['application']} has been Approved , Amount Has Been Transfered to Your Account!"
    ];
    $res = $NotificationTable->insert()->insert_columns($cols)->insert_values($vals)->execute_query();
    return $res;
}

function credit_amount_from_bank($data)
{
    $BankTable = new Table("bank", "Account");

    $Bank = fetch_Bank();
    $Package = get_Package_Data($data['packageid']);

    $Amount = $Bank['Amount'] - $Package['Package_Amount'];

    $res = $BankTable->update("Amount", $Amount)->execute_query();
    return $res;
}


// Data Fetcher...
function get_Package_Data($id)
{
    $Table = new Table("loan_packages", "Package_ID");
    $data = $Table->select()->where("Package_ID", $id)->execute_query()[0];
    return $data;
}
function get_User_Data($id)
{
    $Table = new Table("main", "Account_number");
    $data = $Table->select()->where("Account_number", $id)->execute_query()[0];
    return $data;
}

function fetch_Bank()
{
    $Table = new Table("bank", "Account");
    $data = $Table->select()->execute_query()[0];
    return $data;
}

function get_Interest_Ammount($principalAmount, $interestRate, $timeInYears)
{
    // Convert interest rate to decimal if it is greater than 1
    if ($interestRate > 1) {
        $interestRate = $interestRate / 100;
    }

    // Calculate the interest amount
    $interestAmount = $principalAmount * $interestRate * $timeInYears;

    return $interestAmount;
}
