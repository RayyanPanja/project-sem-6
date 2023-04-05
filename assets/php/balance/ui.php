<?php
include "../connection.php";

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

    <main class="full-size">
        <?php
        $Balance;
        $Fetch = "SELECT * FROM main WHERE `Account_number` = $Account;";
        $Result = mysqli_query($con, $Fetch);
        while ($data = mysqli_fetch_assoc($Result)) {
            $Balance = $data['Amount'];
        }

        ?>

        <h1 class="balance" id="balance">
            <?php
            echo $Balance;
            ?>
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
<script src="../../js/Func.js"></script>
<script>
    ChangeCurrencyFormat('balance',"INR","hi-IN");
    DialogHandler('logout-open', 'logout-close', 'logout-dlg', true);
</script>

</html>