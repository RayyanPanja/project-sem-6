<?php
require "../../Classes/All.class.php";
require "../../include/include.php";
require "../../Logic/TransferLogic.php";



if (isset($_REQUEST['password'])) {
    unset($_SESSION['tempFlag']);

    $Password = $_REQUEST['password'];
    if ($Password === $_SESSION['Password']) {

        $Account = $_REQUEST['Account'];
        $Amount = $_REQUEST['Amount'];
        $Note = $_REQUEST['Note'];
        $Reward = $_REQUEST['Reward'];

        if ($Reward === "") {
            $Tresponse = Transfer(Session::getSession("Account_number"), $Account, $Amount);
            if ($Tresponse) {

                $UserTable = new Table("main", "Account_number");
                $HisAccount = $UserTable->fetchWhere("Account_number", $Account)[0];

                $TransacTable = new Table('transaction', "Receipt_No");
                $Receipt = rand(000000, 9999999);
                $DataSet = array(
                    "Receipt_No" => $Receipt,
                    "From_Acc" => Session::getSession("Account_number"),
                    "To_Acc" => $Account,
                    "Amount" => $Amount,
                    "Receiver" => $HisAccount['Username'],
                    "Sender" => Session::getSession("Username"),
                    "Note" => $Note,
                    "Backup" => Session::getSession("Username")
                );

                // INSERT INTO TRANSACTION TABLE...................
                logTransaction($TransacTable, $DataSet);
                // INSERT INTO TRANSACTION TABLE...................

                // INSERT INTO NOTIFICATION TABLE..................

                // FOR RECEIVER........
                logNotification(new Table("notifications"), $Account, "{$Amount} has Been Transfered to Your Account By " . Session::getSession('Username'));
                // FOR RECEIVER........

                // FOR SENDER.........
                logNotification(new Table("notifications"), Session::getSession("Account_number"), "{$Amount} Debited From Your Account , Transferred To {$HisAccount['Username']}");
                // FOR SENDER.........

                // INSERT INTO NOTIFICATION TABLE..................
                alert("Transfer Successfull", $URL->getView("TransferSucess", "Transfer"));
            } else {
                justAlert("Transfer Failed");
            }
        } else {
            $Tresponse =  TransferWithReward(Session::getSession("Account_number"), $Account, $Amount, $Reward);
            if ($Tresponse) {
                $UserTable = new Table("main", "Account_number");
                $HisAccount = $UserTable->fetchWhere("Account_number", $Account)[0];

                $TransacTable = new Table('transaction', "Receipt_No");
                $Receipt = rand(000000, 9999999);
                $DataSet = array(
                    "Receipt_No" => $Receipt,
                    "From_Acc" => Session::getSession("Account_number"),
                    "To_Acc" => $Account,
                    "Amount" => $Amount,
                    "Receiver" => $HisAccount['Username'],
                    "Sender" => Session::getSession("Username"),
                    "Note" => $Note,
                    "Backup" => Session::getSession("Username")
                );

                // INSERT INTO TRANSACTION TABLE...................
                logTransaction($TransacTable, $DataSet);
                // INSERT INTO TRANSACTION TABLE...................

                // INSERT INTO NOTIFICATION TABLE..................

                // FOR RECEIVER........
                logNotification(new Table("notifications"), $Account, "{$Amount} has Been Transfered to Your Account By " . Session::getSession('Username'));
                // FOR RECEIVER........

                // FOR SENDER.........
                logNotification(new Table("notifications"), Session::getSession("Account_number"), "{$Amount} Debited From Your Account , Transferred To {$HisAccount['Username']}");
                // FOR SENDER.........

                // INSERT INTO NOTIFICATION TABLE..................

                alert("Transfer Successfull , Reward Redeemed", $URL->getView("TransferSucess", "Transfer"));
            } else {
                justAlert("Transfer Failed with Reward");
            }
        }
        die;
    }
}