<?php
include_once "../connection.php";
include_once('../../Models/Tables.php');

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
    <title>Balance</title>

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

    <main class="full-size">
        <?php
        
        $mainObject = fetchWhere($USER_TABLE, "Account_number", $Account);
        $Row = $mainObject['data'];
        $Balance = $Row['Amount']
        ?>

        <h1 class="balance" id="balance">
            <?= $Balance; ?>
        </h1>


    </main>

</body>

<script>
    ChangeCurrencyFormat('balance', "INR", "hi-IN");
    DialogHandler('logout-open', 'logout-close', 'logout-dlg', true);
</script>

</html>