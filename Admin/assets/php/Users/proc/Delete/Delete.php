<?php
include_once('../../../connection.php');

if (isset($_REQUEST['acc'])) {
    $Account = $_REQUEST['acc'];

    $Delete = "DELETE FROM main WHERE `Account_number` = $Account";
    $response = mysqli_query($con, $Delete);

    if ($response) {
        alert("Account {$Account} has been Deleted Permanently", '../../ui.php');
    } else {
        echo "$Account is not Deleted";
    }
}
