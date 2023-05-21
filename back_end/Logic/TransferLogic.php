<?php

$Table = new Table("main", "Account_number");

// Validations....
function validate_password($psw)
{
    if ($psw === Session::getSession("Password")) {
        return true;
    }
    return false;
}
function validate_amount($Sender)
{
    if ($Sender['Amount'] > MIN_AMOUNT) {
        return true;
    }
    return false;
}
// Validations....Ends

function fetch_user($user)
{
    global $Table;
    $res = $Table->select()->where("Account_number", $user)->execute_query()[0];
    return $res;
}

function deduct_amount_from(array $Sender, int $Amount, Request $req)
{
    global $Table;
    $newAmount = 0;
    if (validate_cashback($req->get("Reward"))) {
        // Redeeming Cashback.............................
        $data = get_rewards_data($req->get("Reward"));
        $newAmount = ($Sender['Amount'] - $Amount) + $data['CashBack'];
        delete_cashback($req->get("Reward"));
    } else {
        $newAmount = $Sender['Amount'] - $Amount;
    }
    return $Table->update("Amount", $newAmount)->where("Account_number", $Sender['Account_number'])->execute_query();
}

function add_amount_to(array $Receiver, int $Amount)
{
    global $Table;
    $newAmount = $Receiver['Amount'] + $Amount;
    return $Table->update("Amount", $newAmount)->where("Account_number", $Receiver['Account_number'])->execute_query();
}

function add_notification(array $vals)
{
    $NotificationCols = [
        "Notification_For",
        "Notification_Type",
        "Notification"
    ];

    $Table = new Table("notifications", "id");
    return $Table->insert()->insert_columns($NotificationCols)->insert_values($vals)->execute_query();
}

function log_transaction(array $Sender, array $Receiver, int $amount, string $note = null)
{
    $Receipt = rand(00000, 999999);
    $cols = [
        "Receipt_No",
        "From_Acc",
        "To_Acc",
        "Amount",
        "Receiver",
        "Sender",
        "Backup",
        "Note"
    ];
    $vals = [
        $Receipt,
        $Sender['Account_number'],
        $Receiver['Account_number'],
        $amount,
        $Receiver['Username'],
        $Sender['Username'],
        $Sender['Username'],
        $note
    ];

    $Table = new Table("transaction", "Receipt_No");
    $res  = $Table->insert()->insert_columns($cols)->insert_values($vals)->execute_query();
    if ($res) {
        Session::setSession("tempReceipt", $Receipt);
        return true;
    }
    return false;
}

// CashBack
function generate_reward(int $amount, array $Sender, Request $req)
{
    if ($amount < 200) {
        return false;
    }
    if ($req->get("Reward") !== "") {
        return false;
    }
    // GENERATING REWARD
    $Table = new Table("rewards", "Reward_ID");

    $cashback = generateCashBack();
    $rewardkey = generateRewardKey();
    $expire = getDateAfterDays(rand(2, 7));

    $cols = [
        "For_Account",
        "Code",
        "CashBack",
        "expires"
    ];
    $vals = [
        $Sender['Account_number'],
        $rewardkey,
        $cashback,
        $expire
    ];
    $res =  $Table->insert()->insert_columns($cols)->insert_values($vals)->execute_query();
    if ($res) {
        Session::setSession("RewardKey", $rewardkey);
        Session::setSession("Reward", $cashback);
        Session::setSession("RewardExpire", $expire);
        return true;
    }
}

function validate_cashback($code)
{
    if ($code == "" || empty($code)) {
        return false;
    }
    return true;
}

function get_rewards_data($code)
{
    $Table = new Table("rewards", "Reward_ID");
    $res = $Table->select()->where("Code", $code)->execute_query()[0];
    if (is_array($res)) {
        return $res;
    }
    return 0;
}
function delete_cashback($code)
{
    $Table = new Table("rewards", "Reward_ID");
    $res = $Table->delete()->where("Code", $code)->execute_query();
    return $res;
}
