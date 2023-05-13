<?php
require "../../../Classes/autoload.php";
require "../../Logic/Login.logic.php";
$request = new Request;

if ($request->Exists("adminid")) {
    if (check_if_user_exists($request->get("adminid"))) {
        $UserTable = new Table("admin", "Admin_ID");
        $User = $UserTable->select()->where("Admin_ID", $request->get("adminid"))->get_Table(0);
        if (register_user($User)) {
            Helper::just_move(Route::getHomePage());
        }
    }
}
