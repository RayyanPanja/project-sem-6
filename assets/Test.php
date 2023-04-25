<?php
include('Fetched.php');
$table = fetchAllFrom($con,"main");
// pa($table);

$Row = searchData($table,"Account_number","9786");
Write($Row['data']);
?>