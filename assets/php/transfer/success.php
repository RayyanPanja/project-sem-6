<?php
include_once "../connection.php";

$Account = $_SESSION['Account_number'];
$SirName = $_SESSION['Sirname'];
$Name = $_SESSION['Firstname'];
$FatherName = $_SESSION['Fathername'];
$Image = $_SESSION['Img_Path'];
$Email = $_SESSION['Email'];

$Receipt = $_SESSION['Receipt'];

$id;
$from;
$to;
$amount;
$note;
$date;
$time;
$sender;
$receiver;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>

</head>

<body>
    <!-- Logout Form -->
    <dialog class="login-form" id="logout-dlg">
        <div class="login-img-holder">
            <img src="../../img/storage/<?= $Image; ?>" alt="Login">
        </div>
        <h1>Logout</h1>
        <form action="../auth/logout.php" method="post">
            <h1>Are You Sure You Want to Logout </h1>
            <div class="form-btn-set">
                <button class="form-btn primary-btn" type="submit">Logout</button>
                <button class="form-btn secondary-btn   " type="reset" id="logout-close">Cancle</button>
            </div>
        </form>
    </dialog>
    <!-- Logout Form...ENDS -->

    <!-- NAVBAR -->
    <?php
    include_once("../../components/MainNavbar.php");
    ?>
    <!-- NAVBAR -->

    <?php
    $Fetch = "SELECT * FROM `transaction` WHERE `Receipt_No` = $Receipt";
    $FetchResult = mysqli_query($con, $Fetch);
    while ($data = mysqli_fetch_assoc($FetchResult)) {
        $id = $data['Receipt_No'];
        $from = $data['From_Acc'];
        $to = $data['To_Acc'];
        $amount = $data['Amount'];
        $note = $data['Note'];
        $date = $data['Date'];
        $time = $data['Time'];
        $sender = $data['Sender'];
        $receiver = $data['Receiver'];
    }
    ?>

    <main>
        <dialog class="transaction" open>
            <h1 class="text-white">Transfer Successfull</h1>
            <div class="transaction-slip">
                <table>
                    <tr>
                        <th>Transaction ID</th>
                        <td><?php echo $id; ?></td>
                    </tr>
                    <tr>
                        <th>From Account</th>
                        <td><?php echo $from; ?></td>
                    </tr>
                    <tr>
                        <th>To Account</th>
                        <td><?php echo $to; ?></td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td><?php echo $amount; ?></td>
                    </tr>
                    <tr>
                        <th>Note</th>
                        <td><?php echo $note; ?></td>
                    </tr>
                    <tr>
                        <th>Date & Time:- </th>
                        <td><?php echo $date . " : " . $time; ?></td>
                    </tr>
                    <tr>
                        <th>Sender</th>
                        <td><?php echo $sender; ?></td>
                    </tr>
                    <tr>
                        <th>Receiver</th>
                        <td><?php echo $receiver; ?></td>
                    </tr>
                </table>
            </div>
        </dialog>
    </main>
</body>

</html>

<?php
$Insert = "INSERT INTO `notifications` 
(`Notification_For`, `Notification`, `Time`) 
VALUES 
($to,'A Total Amount of Rs.$amount./- was Transferred to Your Account By $sender', current_timestamp());";
mysqli_query($con, $Insert);
?>