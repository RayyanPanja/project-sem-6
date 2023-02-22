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
    <title>Balance</title>
    <link rel="stylesheet" href="../../css/style.css">
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
    <nav class="navbar">
        <div class="logo">
            <h1>^w^</h1>
        </div>
        <div class="link-set">
            <a href="../../../home.php" class="link">Home</a>
            <a href="../dashboard/dashboard.php" class="link">DashBoard</a>
            <a href="../transfer/ui.php" class="link">Transfer</a>
            <a href="../loan/ui.php" class="link">Loan</a>
            <a href="ui.php" class="link">Balance</a>
            <a href="../contact/ui.php" class="link">Contact</a>
            <button type="submit" class="logout-btn" id="logout-open">Logout</button>
        </div>
        <div class="auth">
            <div class="user-detail-box">
                <div class="user-img-holder">
                    <img src="<?php echo "../../img/storage/" . $Image; ?>" alt="<?php echo $SirName . $Name . $FatherName; ?>">
                </div>
                <div class="">
                    <h1 class="user-name" title="<?php echo $SirName . " " . $Name . " " . $FatherName; ?>">
                        <?php
                        echo $Name;
                        ?>
                    </h1>
                </div>
            </div>
        </div>
    </nav>

    <main class="full-size">
        <?php
        $Balance;
        $Fetch = "SELECT * FROM main WHERE `Account_number` = $Account;";
        $Result = mysqli_query($con, $Fetch);
        while ($data = mysqli_fetch_assoc($Result)) {
            $Balance = $data['Amount'];
        }

        ?>

        <h1 class="balance">
            <?php
            echo $Balance;
            ?>/-
        </h1>

        <div class="transaction-list">
            <?php
            $FetchTransaction = "SELECT * FROM `transaction` WHERE `From_Acc` = $Account OR `To_Acc` = $Account ORDER BY `transaction`.`DateTime` DESC";
            $FetchTransactionResult = mysqli_query($con, $FetchTransaction);
            if (mysqli_num_rows($FetchTransactionResult) > 0) {
                while ($data = mysqli_fetch_assoc($FetchTransactionResult)) { ?>
                    <div class="transaction-display">
                        <div class="transaction-acc-no">
                            <h2>
                                From:- <?php echo $data['From_Acc']; ?>
                            </h2>
                            <h2>
                                To:- <?php echo $data['To_Acc']; ?>
                            </h2>
                        </div>
                        <div class="transaction-name">
                            <h2>
                                Sender:- <?php echo $data['Sender']; ?>
                            </h2>
                            <h2>
                                Receiver:- <?php echo $data['Receiver']; ?>
                            </h2>
                        </div>
                        <div class="transaction-amount">
                            <h1>
                                <?php echo $data['Amount']; ?>
                            </h1>
                        </div>
                        <div class="transaction-note">
                            <h4>
                                Note:- <?php echo $data['Note']; ?>
                            </h4>
                        </div>
                        <div class="transaction-date">
                            <?php echo $data['DateTime']; ?>
                        </div>

                    </div>
            <?php }
            }
            ?>
        </div>

    </main>

</body>
<script src="../../js/Dialog.js"></script>
<script>
    DialogHandler('logout-open', 'logout-close', 'logout-dlg', true);
</script>

</html>