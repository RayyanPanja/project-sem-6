<?php

// Fetch Users...........................
function fetchUsers($AccountToFetch)
{
    $URL = new URL;
    $UserTable = new Table("main", "Account_number");
    $Account = $UserTable->fetchWhere("Account_number", $AccountToFetch);
    if (is_bool($Account)) {
        alert("Could Not Fetch My User Details", $URL->getView("Transfer", "Transfer"));
        // return false;
    } else {
        return $Account[0];
    }
}
// Fetch Users...........................

// Update User Amount.......................................................................
function updateUserAmount(Table $UserTable, $FromAccount, $ToAccount, $MyAmount, $HisAmount)
{
    $URL = new URL;
    $UserTable = new Table("main", "Account_number");
    $MyUpdateResponse = $UserTable->updateData("Account_number", $FromAccount, "Amount", $MyAmount);
    if ($MyUpdateResponse) {
        $HisUpdateResponse = $UserTable->updateData("Account_number", $ToAccount, "Amount", $HisAmount);
        if ($HisUpdateResponse) {
            return true;
        }
    }
    return false;
}
// Update User Amount.......................................................................

// Generate Reward TIcket.................................
function generateReward($FromAccount, $Amount)
{
    $URL = new URL;
    $Reward = 0.00;
    $RewardTable = new Table('rewards', "For_Account");
    $Key = generateRewardKey();
    $expireDate = getDateAfterDays(rand(3, 9));

    if ($Amount >= HUGE_REWARD_AMOUNT) {
        $Reward = generateHugeCashBack();
    } else {
        $Reward = generateCashBack();
    }

    $DataSet = array(
        "Reward_ID" => rand(0000000000, 99999999999),
        "For_Account" => $FromAccount,
        "Code" => $Key,
        "CashBack" => $Reward,
        "expires" => $expireDate
    );

    $res = $RewardTable->insertData($DataSet);
    if ($res) {
        Session::setSession("RewardKey", $Key);
        Session::setSession("Reward", $Reward);
        Session::setSession("RewardExpire", $expireDate);
        return true;
    } else {
        alert("INSERTION FAILED", $URL->getView("Transfer", "Transfer"));
        // return false;
    }
}
// Generate Reward TIcket.................................

function deleteReward($RewardCode)
{
    $RewardsTable = new Table("rewards", "Reward_ID");
    return ($RewardsTable->deleteFromColumn("Code", $RewardCode)) ?  true : false;
}


// Add Data in Transaction Table.....................
function logTransaction(Table $TransacTable, array $DataSet)
{

    $res = $TransacTable->insertData($DataSet);
    if ($res) {
        // alert("Sucess",$URL->getView("Transfer","Transfer"));
        return true;
    } else {
        // alert("Failed",$URL->getView("Transfer","Transfer"));
        return false;
    }
}
// Add Data in Transaction Table.....................

// Add Notifications.......
function logNotification(Table $Notification, int $ForAccount, string $Message)
{
    $DataSet = array(
        "id" => rand(00000, 999999),
        "Notification_For" => $ForAccount,
        "Notification_Type" => "Notification",
        "Notification" => $Message
    );

    $Notification->insertData($DataSet);
}
// Add Notifications.......

// Transfer with Reward....................................................
function TransferWithReward($FromAccount, $ToAccount, $Amount, $RewardCode)
{
    $URL = new URL;

    $UserTable = new Table("main", "Account_number");

    $MyAccount = fetchUsers($FromAccount);
    $HisAccount = fetchUsers($ToAccount);

    if (is_bool($MyAccount) || is_bool($HisAccount)) {
        alert("Account Could not be Found", $URL->getView("Transfer", "Transfer"));
        return false;
    }

    if ($MyAccount['Amount'] > MIN_AMOUNT) {

        $RewardsTable = new Table("rewards", "For_Account");
        $res = $RewardsTable->fetchWhere("Code", $RewardCode)[0];
        $CashBack = $res['CashBack'];

        // Math..........
        $MyNewAmount = (intval($MyAccount['Amount']) - $Amount) + $CashBack;
        $HisNewAmount = (intval($HisAccount['Amount']) + $Amount);
        // Math..........

        if (updateUserAmount($UserTable, $FromAccount, $ToAccount, round($MyNewAmount, 2), $HisNewAmount)) {
            logNotification(new Table('notifications'), $FromAccount, "{$CashBack} CashBack Redeemed!!!");
            return (deleteReward($RewardCode)) ? true : false;
        } else {
            alert("Update Failed", $URL->getView("Transfer", "Transfer"));
            // return false;
        }
    } else {
        alert("Insufficient Amount...", $URL->getView("Transfer", "Transfer"));
    }
}
// Transfer with Reward....................................................

// Normal Transfer...................................
function Transfer($FromAccount, $ToAccount, $Amount)
{
    $URL = new URL();
    $UserTable = new Table("main", "Account_number");

    $MyAccount = fetchUsers($FromAccount);
    $HisAccount = fetchUsers($ToAccount);

    if (is_bool($MyAccount) || is_bool($HisAccount)) {
        alert("Account Could not be Found", $URL->getView("Transfer", "Transfer"));
        // return false;
    }

    if ($MyAccount['Amount'] > MIN_AMOUNT) {

        if ($Amount >= 200) {

            generateReward($FromAccount, $Amount);

            // Math..........
            $MyNewAmount = intval($MyAccount['Amount']) - $Amount;
            $HisNewAmount = intval($HisAccount['Amount']) + $Amount;
            // Math..........

            if (updateUserAmount($UserTable, $FromAccount, $ToAccount, $MyNewAmount, $HisNewAmount)) {
                return true;
            } else {
                alert("Update Failed", $URL->getView("Transfer", "Transfer"));
                // return false;
            }
        } else {

            // Math..........
            $MyNewAmount = intval($MyAccount['Amount']) - $Amount;
            $HisNewAmount = intval($HisAccount['Amount']) + $Amount;
            // Math..........

            if (updateUserAmount($UserTable, $FromAccount, $ToAccount, $MyNewAmount, $HisNewAmount)) {
                return true;
            } else {
                alert("Update Failed", $URL->getView("Transfer", "Transfer"));
                // return false;
            }
        }
    } else {
        alert("Insufficent Amount....", $URL->getView("Transfer", "Transfer"));
    }
}
// Normal Transfer...................................
