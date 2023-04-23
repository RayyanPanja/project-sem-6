<?php
include "../connection.php";

if (isset($_REQUEST['account'], $_REQUEST['amount'], $_REQUEST['confirmAmount'])) {
    $Account = $_REQUEST['account'];
    $Amount = $_REQUEST['amount'];
    $Confirm = $_REQUEST['confirmAmount'];

    if ($Amount === $Confirm) {
        $TotalAmount;
        $fetchMain = "SELECT * FROM main WHERE `Account_number` = $Account";
        $FresultMain = mysqli_query($con, $fetchMain);
        if (mysqli_num_rows($FresultMain) > 0) {
            while ($data = mysqli_fetch_assoc($FresultMain)) {
                $TotalAmount = $data['Amount'];
            }

            $TotalAmount += $Amount;

            $updateMain = "UPDATE `main` SET `Amount` = $TotalAmount WHERE `Account_number` = $Account";
            $UresultMain = mysqli_query($con, $updateMain);
            if ($UresultMain) {
                $insertNotification = "INSERT INTO `notifications` (`Notification_For`, `Notification`, `Time`)
                VALUES ($Account, 'Amount {$Amount}  Deposited to Your Account: {$Account}, TotalAmount: {$TotalAmount}',current_timestamp())";
                $IresultNotification = mysqli_query($con, $insertNotification);
                if ($IresultNotification) {
                    alert("Amount Deposited Successfully", "ui.php");
                } else {
                    alert("Notification Cant be Sent..", "ui.php");
                }
            } else {
                alert("Amount Could not be Deposited...", "ui.php");
            }
        } else {
            alert("Account Doesnot Exist", "ui.php");
        }
    } else {
        alert("Amount Differs", "ui.php");
    }
}
