<?php

require_once "Connection.class.php";
require_once "Table.class.php";
require_once "Session.class.php";
require_once "Route.class.php";
require_once "Helper.class.php";
require_once "Request.class.php";


Session::start_Session();
$currentTimestamp = date('Y-m-d H:i:s', time());
?>

<?= Route::getCSS("Style"); ?>