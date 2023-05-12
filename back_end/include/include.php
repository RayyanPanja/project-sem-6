<?php
require "func.php";

define("MIN_ACCOUNT_BALANCE", 1000);

define("MIN_AMOUNT", 100);
define("HUGE_REWARD_AMOUNT", 1000);

Session::startSession();

$URL = new URL();

?>
<script src="<?= $URL->getMainURL() ?>/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= $URL->getMainURL() ?>/node_modules/jquery/dist/jquery.js"></script>