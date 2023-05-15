<?php
require "../../../Classes/autoload.php";

$request = new Request;

if ($request->Exists('account')) {
    $table = new Table("main", "Account_number");

    $res = $table->update("Blocked", 0)->where("Account_number", $request->get("account"))->execute_query();
    if ($res) {
        Helper::just_move(Route::getView("Users", "Users"));
    }
}
