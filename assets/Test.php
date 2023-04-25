<?php
include('Fetched.php');
$table = FetchFrom($con,"main");
// pa($table);

$Row = searchData($table,"Account_number","9786");
Write($Row['data']);
?>