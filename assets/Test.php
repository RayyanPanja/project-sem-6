<?php
include('DBFuncs.php');
$table = fetchAllFrom($con,"main");
// pa($table);

$Row = fetchWhere($table,"Account_number","9786");
Write($Row['data']['Amount']);
?>