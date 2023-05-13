<?php
require "../../../Classes/autoload.php";

$request = new Request;

if ($request->Exists("account") && $request->Exists("amount")) {

    $UserTable = new Table("main", "Account_number");
    $User = $UserTable->select()->where("Account_number", Session::get_Session("AccountDetails"))->execute_query()[0];
    $Amount = $User["Amount"] + $request->get("amount");
    $res = $UserTable->update("Amount", $Amount)->where("primary Key", Session::get_Session('AccountDetails'))->execute_query();

    if ($res === boolval(true)) {
        $NTable = new Table("notifications", "id");
        $Columns = $NTable->Fetch_Columns()->get_Columns();
        $Values = [
            rand(00000, 99999),
            Session::get_Session("AccountDetails"),
            "Notification",
            "{$request->get('amount')}/- has been Deposited to Your Account , on Data: {$currentTimestamp}",
            $currentTimestamp
        ];
        $res = $NTable->insert()->insert_columns($Columns)->insert_values($Values)->execute_query();
        if ($res) {
            Helper::just_move(Route::getView("Users", "Users"));
        } else {
            Helper::just_alert("Failed");
        }
    }
}
