<?php
include "../../connection.php";

$MyAccount = $_SESSION['Account'];
$MyPassword = $_SESSION['Password'];
$MyName = $_SESSION['Name'];
$MyEmail = $_SESSION['email'];
$MyUsername = $_SESSION['Username'];

$HisAccount = $_REQUEST['hisnaccount'];
$AmountToSend = $_REQUEST['amounttosend'];
$Note = $_REQUEST['note'];
$Pin = $_REQUEST['password'];

$hisAmount;
$hisUsername;

$MyAmount;

if (isset($Pin) && $Pin === $MyPassword) {

    $FetchHisData = "SELECT * FROM `main` WHERE `Account_number` = $HisAccount;";
    $HisFetchResult = mysqli_query($con, $FetchHisData);
    if ($HisFetchResult) {
        if (mysqli_num_rows($HisFetchResult) == 1) {
            while ($data = mysqli_fetch_assoc($HisFetchResult)) {
                $hisAmount = $data['Amount'];
                $hisUsername = $data['Username'];
            }
            $FetchMyData = "SELECT * FROM `main` WHERE `Account_number` = $MyAccount;";
            $MyFetchResult = mysqli_query($con, $FetchMyData);
            if ($MyFetchResult) {
                if (mysqli_num_rows($MyFetchResult) == 1) {
                    while ($data = mysqli_fetch_assoc($MyFetchResult)) {
                        $MyAmount = $data['Amount'];
                    }
                } else {
                    echo ("<script>
                    alert('Try Logging out and Logging in Again!!! ')
                    window.location.assign('../ui.php');
                    </script>"
                    );
                }

                if ($AmountToSend <= $MyAmount && $MyAmount != 0) {
                    // Main Logic {{Will Add Cashback Feature Here }} ....
                    $MyAmount -= $AmountToSend;
                    $hisAmount += $AmountToSend;

                    $UpdateHisAccount = "UPDATE `main` SET `Amount` = $hisAmount WHERE `Account_number` = $HisAccount;";
                    $HisUpdateResult = mysqli_query($con, $UpdateHisAccount);
                    if ($HisUpdateResult) {
                        $UpdateMyAccount = "UPDATE `main` SET `Amount` = $MyAmount WHERE `Account_number` = $MyAccount;";
                        $MyUpdateResult = mysqli_query($con, $UpdateMyAccount);
                        if ($MyUpdateResult) {

                            // RECEIPT GENERATOR.....
                            $TID = rand(000000, 9999999);

                            $Insert = "INSERT INTO `transaction` (`Receipt_No`, `From_Acc`, `To_Acc`, `Amount`, `Date`, `Time`, `DateTime`, `Receiver`, `Sender`,`Note`,`Backup`) 
                    VALUES ($TID, $MyAccount, $HisAccount, $AmountToSend, current_timestamp(), current_timestamp(), current_timestamp(), '$hisUsername', '$MyUsername','$Note','$MyUsername');";

                            $InsertResult = mysqli_query($con, $Insert);

                            if ($InsertResult) {
                                $_SESSION['Receipt'] = $TID;
                                header("Location: ../success.php");
                            }

                            // RECEIPT GENERATOR ENDS.....
                        }
                    }
                } else {
                    echo ("<script>
                    alert('Funds Insufficient!!!! Try Depositing Some Amount First')
                    window.location.assign('../ui.php');
                </script>"
                    );
                }
            }
        } else {
            echo ("<script>
                    alert('Account Doesnot Exist!!')
                    window.location.assign('../ui.php');
                </script>"
            );
        }
    }
} else {
    echo ("<script>
    alert('Pin Incorrect ///(>_o_<)/// ')
    window.location.assign('../ui.php');
</script>"
    );
}
