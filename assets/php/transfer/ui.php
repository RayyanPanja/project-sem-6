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
    <title>Transfer</title>

</head>

<body>
    <!-- NAVBAR -->
    <?php
    include("../../components/MainNavbar.php");
    ?>
    <!-- NAVBAR -->

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
                        <input type="number" name="amount" id="amount" class="input t-input" placeholder="000" step="0.01">
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
            <h3 align="center">Are You Sure You Want to Continue Your Transaction of <h1> Rs. <?php echo $_SESSION['Amount']; ?> <br> From Your <?php echo $_SESSION['Account_number']; ?> <br> To <?php echo $_SESSION['HisAccount']; ?></h1>
            </h3>
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
<script>
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