<?php

// Fetch Users...........................
function fetchUsers($AccountToFetch)
{
    $URL = new URL;
    $UserTable = new Table("main", "Account_number");
    $Account = $UserTable->select()->where("Account_number", $AccountToFetch)->execute_query()[0];
    if (is_bool($Account)) {
        alert("Could Not Fetch My User Details", $URL->getView("Transfer", "Transfer"));
        // return false;
    } else {
        return $Account;
    }
}
// Fetch Users...........................

// Update User Amount.......................................................................
function updateUserAmount(Table $UserTable, $FromAccount, $ToAccount, $MyAmount, $HisAmount)
{
    $UserTable = new Table("main", "Account_number");

    $res = $UserTable->update("Amount", $MyAmount)->where("Account_number", $FromAccount)->execute_query();
    $res2 = $UserTable->update("Amount", $HisAmount)->where("Account_number", $ToAccount)->execute_query();
    if ($res && $res2) {
        return true;
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
        $Reward = generateCashBack();
    } else {
        $Reward = generateCashBack();
    }

    $col = [
        "Reward_ID",
        "For_Account",
        "Code",
        "CashBack",
        "expires"
    ];
    $val = array(
        rand(0000000000, 99999999999),
        $FromAccount,
        $Key,
        $Reward,
        $expireDate
    );
    $res = $RewardTable->insert()->insert_columns($col)->insert_values($val)->execute_query();

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
    return ($RewardsTable->delete()->where("Code", $RewardCode)->execute_query()) ?  true : false;
}


// Add Data in Transaction Table.....................
function logTransaction(array $col, array $val)
{
    $TransacTable = new Table("transaction","Receipt_No");
    $res = $TransacTable->insert()->insert_columns($col)->insert_values($val)->execute_query();
    if ($res) {
        return true;
    } else {
        return false;
    }
}
// Add Data in Transaction Table.....................

// Add Notifications.......
function logNotification(Table $Notification, int $ForAccount, string $Message)
{
    $col = [
        "id",
        "Notification_For",
        "Notification_Type",
        "Notification"
    ];
    $val = array(
        rand(00000, 999999),
        $ForAccount,
        "Notification",
        $Message
    );

    $Notification->insert()->insert_columns($col)->insert_values($val)->execute_query();
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
        $res = $RewardsTable->select()->where("Code",$RewardCode)->execute_query()[0];
        $CashBack = $res['CashBack'];

        // Math..........
        $MyNewAmount = (intval($MyAccount['Amount']) - $Amount) + $CashBack;
        $HisNewAmount = (intval($HisAccount['Amount']) + $Amount);
        // Math..........

        if (updateUserAmount($UserTable, $FromAccount, $ToAccount, round($MyNewAmount, 2), $HisNewAmount)) {
            logNotification(new Table('notifications',"id"), $FromAccount, "{$CashBack} CashBack Redeemed!!!");
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
