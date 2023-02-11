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
    <title>Transfer</title>
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
            <a href="ui.php" class="link">Transfer</a>
            <a href="../loan/ui.php" class="link">Loan</a>
            <a href="../balance/ui.php" class="link">Balance</a>
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

    <main>
        <div class="transfer-form-container">
            <h1 align="center">
                Transfer
            </h1>
            <form action="processor/confirmation.php" method="post" id="transfer">
                <div class="row">
                    <div class="col-lab">
                        <label for="Account Number">Account Number</label>
                    </div>
                    <div class="col-inp">
                        <input type="number" name="account" id="acc" class="input t-input" maxlength="5" placeholder="0000">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lab">
                        <label for="Amount">Amount</label>
                    </div>
                    <div class="col-inp">
                        <input type="number" name="amount" id="amount" class="input t-input" placeholder="000">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lab">
                        <label for="Amount">Note</label>
                    </div>
                    <div class="col-inp">
                        <input type="text" name="note" id="note" class="input t-input" placeholder="Note...">
                    </div>
                </div>

                <div class="transfer-btn-set">
                    <button type="reset" class="cancle btn">Cancle</button>
                    <button type="submit" class="submit btn" id="Transfer-btn">Transfer</button>
                </div>
            </form>
        </div>
    </main>
    <?php
    if (isset($_SESSION['HisAccount'])) { ?>
        <dialog class="login-form" id="Confirm" open>
            <h1>Are You Sure You </h1>
            <h3 align="center">Are You Sure You Want to Continue Your Transaction of <h1> Rs. <?php echo $_SESSION['Amount']; ?> <br> From Your <?php echo $_SESSION['Account']; ?> <br> To <?php echo $_SESSION['HisAccount']; ?></h1></h3>
            <form action="processor/transfer.php" method="post">
                <h1><label for="Pin">Enter Pin</label></h1>

                <input type="number" class="hidden" name="hisnaccount" value="<?php echo $_SESSION['HisAccount']; ?>">
                <input type="number" class="hidden" name="amounttosend" value="<?php echo $_SESSION['Amount']; ?>">
                <input type="text" class="hidden" name="note" value="<?php echo $_SESSION['Note']; ?>">

                <input type="password" name="password" id="password" class="input t-input" placeholder="******">

                <div class="transfer-btn-set">
                    <button type="reset" id="cancle" class="cancle btn">Cancle</button>
                    <button type="submit" class="submit btn" id="Transfer-btn">Confirm</button>
                </div>
            </form>
        </dialog>
    <?php } ?>

</body>
<script src="../../js/Dialog.js"></script>
<script>
    DialogHandler('logout-open', 'logout-close', 'logout-dlg', true);
    const CancleBtn = document.querySelector('#cancle');
    CancleBtn.addEventListener('click', () => {
        const Dialog = document.querySelector('#Confirm');
        Dialog.close();
        <?php
        unset($_SESSION['HisAccount'], $_SESSION['Amount']);
        ?>
    });
</script>

</html>