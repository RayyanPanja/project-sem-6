<?php
require('../../../connection.php');

if (isset($_REQUEST['acc'])) {
    $Account = $_REQUEST['acc'];

    $Update = "UPDATE main SET `Blocked` = true WHERE `Account_number` = $Account";
    $response = mysqli_query($con, $Update);

    if ($response) {
        $_SESSION['DetailAcc'] = $Account; 
        alert("Account {$Account} has been Blocked", '../Detail.php');
    } else {
        echo "$Account is not Blocked";
    }
}
