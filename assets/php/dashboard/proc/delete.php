<?php
include('../../connection.php');
include('../../../Fetched.php');

$result = deleteData($con, "notifications", 'id', $_REQUEST['id']);
if ($result) {
    return header("Location: ../dashboard.php");
} else {
    alert("Could not Delete That Notification", '../dashboard.php');
}
