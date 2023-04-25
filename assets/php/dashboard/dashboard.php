<?php
include "../connection.php";

$Account = $_SESSION['Account_number'];
$SirName = $_SESSION['Sirname'];
$Name = $_SESSION['Firstname'];
$FatherName = $_SESSION['Fathername'];
$Image = $_SESSION['Img_Path'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.css' integrity='sha512-2dJkRM/DmWkZqINs3QixNKKsgG9mlBT9/PieLVF8OEGHCpPNBoPFYmGPL/yD7JuQVVm2IESF5K0zTDBaf4qehQ==' crossorigin='anonymous' />
    <link rel="stylesheet" href="../../css/root.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <dialog class="side-nav-bar" open>
        <div class="user-details">
            <div class="side-nav-user-img-holder">
                <img src="../../img/storage/<?php echo $Image; ?>" alt="IMG" class="side-nav-pfp-img">
            </div>
            <div class="user-name">
                <h1><?php echo $Name; ?></h1>
            </div>
        </div>
        <div class="side-nav-link-set">
            <a href="../../../home.php" class="side-link">Home</a>
            <a href="../transfer/ui.php" class="side-link">Transfer</a>
            <a href="../loan/ui.php" class="side-link">Loan</a>
            <a href="../pin.php" class="side-link">Balance</a>
            <a href="../settings/" class="side-link">Settings</a>
        </div>
    </dialog>
    <main class="panel">
        <div class="banner">
            <h1>Welcome <?php echo $Name; ?></h1>
        </div>

        <div class="menubar">
            <div class="notifications">
                <div class="pop-up" id="notification-pop-up">
                        <?php
                        $fetch = "SELECT * FROM `notifications` WHERE `Notification_For` = $Account ORDER BY `Time` DESC";
                        $result = mysqli_query($con, $fetch);
                        if (mysqli_num_rows($result) > 0) {
                            while ($data = mysqli_fetch_assoc($result)) { ?>
                                <div class="notification"><?= $data['Notification']; ?></div>
                            <?php }
                        } else { ?>
                            <div class="notification">No Notifications...</div>
                        <?php }
                        ?>
                </div>
                <button class="menu-btn" id="notification-btn">
                    +
                </button>
            </div>
        </div>

        <section class="transaction-history">
            <h1 class="sec-title">Transaction History</h1>
            <table class="t-table">
                <tr>
                    <th>Transaction ID</th>
                    <th>From Account</th>
                    <th>To Account</th>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Amount</th>
                    <th>Note</th>
                    <th>Date</th>
                </tr>
                <?php
                $Tfetch = "SELECT * FROM `transaction` WHERE `From_Acc` AND `To_Acc` = $Account ORDER BY `DateTime` DESC LIMIT 6 ";
                $Tresult = mysqli_query($con, $Tfetch);
                if (mysqli_num_rows($Tresult) > 0) {
                    while ($data = mysqli_fetch_assoc($Tresult)) { ?>
                        <tr>
                            <td><?= $data['Receipt_No']; ?></td>
                            <td><?= $data['From_Acc']; ?></td>
                            <td><?= $data['To_Acc']; ?></td>
                            <td><?= $data['Sender']; ?></td>
                            <td><?= $data['Receiver']; ?></td>
                            <td><?= $data['Amount']; ?></td>
                            <td><?= $data['Note']; ?></td>
                            <td><?= $data['DateTime']; ?></td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<h1>No Transactions Yet..</h1>";
                }
                ?>
            </table>
            <a href="../pin.php" class="outside-cool-link">Check Out More...</a>
        </section>
    </main>

</body>
<script src="../../js/Func.js"></script>
<script>
    showNotifications('notification-pop-up', 'notification-btn', 'pop-up-active')
</script>

</html>