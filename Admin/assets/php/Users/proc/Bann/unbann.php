<?php
require('../../../connection.php');

if (isset($_REQUEST['acc'])) {
    $Account = $_REQUEST['acc'];

    $Update = "UPDATE main SET `Blocked` = false WHERE `Account_number` = $Account";
    $response = mysqli_query($con, $Update);

    if ($response) {
        $_SESSION['DetailAcc'] = $Account; 
        alert("Account {$Account} has been UnBlocked", '../Detail.php');
    } else {
        echo "$Account is not UnBanned";
    }
}
