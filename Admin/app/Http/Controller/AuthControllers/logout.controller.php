<?php
require "../../../Classes/autoload.php";
Session::destroy_Session();
Helper::just_move(Route::getHomePage());
?>