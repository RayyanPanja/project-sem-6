<?php
require "../../../Classes/autoload.php";
$request = new Request;

if($request->Exists("account")){
    Session::setSession("AccountDetails",$request->get("account"));

    Helper::just_move(Route::getView("FullDetails","Users"));
}
