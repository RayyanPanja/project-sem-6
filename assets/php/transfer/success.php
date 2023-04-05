<?php
include "../connection.php";

$Account = $_SESSION['Account'];
$SirName = $_SESSION['Sirname'];
$Name = $_SESSION['Name'];
$FatherName = $_SESSION['Father'];
$Image = $_SESSION['image'];
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
            <img src="../../img/storage/<?php echo $Image; ?>" alt="Login">
        </div>
        <h1>Logout</h1>
        <form action="../auth/logout.php" method="post">
            <h1>Are You Sure You Want to Logout </h1>
            <div class="login-btn-set">
                <button class="login-btn cool-btn" type="submit">Logout</button>
                <button class="cancle-btn cool-btn" type="reset" id="logout-close">Cancle</button>
            </div>
        </form>
    </dialog>
    <!-- Logout Form...ENDS -->
    
    <!-- NAVBAR -->
    <?php
    include("../../components/MainNavbar.php");
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
            <h1>Transfer Successfull</h1>
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
<script src="../../js/Func.js"></script>
<script>
    DialogHandler('logout-open', 'logout-close', 'logout-dlg', true);
</script>

</html>

<?php
$Insert = "INSERT INTO `notifications` 
(`Notification_For`, `Notification`, `Time`) 
VALUES 
($to,'A Total Amount of Rs.$amount./- was Transferred to Your Account By $sender', current_timestamp());";
mysqli_query($con, $Insert);
?>