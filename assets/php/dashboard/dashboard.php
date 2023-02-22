<?php
include "../connection.php";
session_start();
$Account = $_SESSION['Account'];
$SirName = $_SESSION['Sirname'];
$Name = $_SESSION['Name'];
$FatherName = $_SESSION['Father'];
$Image = $_SESSION['image'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../css/root.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <dialog class="side-nav-bar" open>
        <div class="user-details">
            <div class="img-holder">
                <img src="../../img/storage/<?php echo $Image; ?>" alt="IMG">
            </div>
            <div class="user-name">
                <h1><?php echo $Name; ?></h1>
            </div>
        </div>
        <div class="side-nav-link-set">
            <a href="../../../home.php" class="side-link">Home</a>
            <a href="../transfer/ui.php" class="side-link">Transfer</a>
            <a href="../loan/ui.php" class="side-link">Loan</a>
            <a href="../balance/ui.php" class="side-link">Balance</a>
            <a href="../settings/" class="side-link">Settings</a>
        </div>
    </dialog>
    <main class="panel">
        <div class="intro-title">
            <h1>Welcome <?php echo $Name; ?></h1>
        </div>
        <div class="transactions-history">
            <div class="receive">
                <h1>Received</h1>
                <?php
                $fetch = "SELECT * FROM `transaction` WHERE `To_Acc` = $Account ORDER BY `Date` DESC ;";
                $result = mysqli_query($con, $fetch);
                if (mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) { ?>
                        <div class="detail-card">
                            <div class="account"><?php echo $data['To_Acc']; ?></div>
                            <div class="amount lime">Rs.<?php echo $data['Amount']; ?>/-</div>
                            <div class="name">From: <?php echo $data['Sender']; ?></div>
                            <div class="date">Date:- <?php echo $data['Date'] . "::" . $data['Time']; ?></div>
                        </div>
                <?php }
                } else {
                    echo "<h1 style='margin-top:30%;'>NO Transactions Yet</h1>";
                }
                ?>
                <div class="detail-card"></div>
            </div>
            <div class="sent">
                <h1>Sent</h1>
                <?php
                $fetch = "SELECT * FROM `transaction` WHERE `From_Acc` = $Account ORDER BY `Date` DESC;";
                $result = mysqli_query($con, $fetch);
                if (mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) { ?>
                        <div class="detail-card">
                            <div class="amount red">Rs.<?php echo $data['Amount']; ?>/-</div>
                            <div class="name">To: <?php echo $data['Receiver']; ?></div>
                            <div class="date">Date:- <?php echo $data['Date'] . "::" . $data['Time']; ?></div>
                        </div>
                <?php }
                } else {
                    echo "<h1 style='margin-top:30%;'>NO Transactions Yet</h1>";
                }
                ?>
                <div class="detail-card"></div>
            </div>
        </div>
    </main>

</body>

</html>