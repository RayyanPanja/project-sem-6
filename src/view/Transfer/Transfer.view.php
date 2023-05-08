<?php
require "../../../back_end/Classes/All.class.php";
require "../../../back_end/include/include.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
    <link rel="stylesheet" href="<?= $URL->getCss("Style") ?>">
</head>

<body>
    <?php include("../component/mainNav.comp.php"); ?>
    <main class="p-t-5">
        <div class="transfer-form-container">
            <form action="" method="post">
                <div class="form-segment">
                    <h1 class="segment-title">Transfer?</h1>
                    <div class="form-text">
                        on Transaction of Rs.200/- you will Get Rewards
                    </div>
                    <div class="row">
                        <div class="set">
                            <label for="Account">Account Number</label>
                            <input type="number" name="account" id="accno" class="form-input" placeholder="e.g.123354" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="set">
                            <label for="Amount">Amount</label>
                            <input type="number" name="amount" value="<?= (isset($_SESSION['dashKey'])) ? 200 : "" ?>" id="amount" class="form-input" value="0" placeholder="0" max="25000" required>
                        </div>
                    </div>
                    <div class="multi-row">
                        <div class="set">
                            <label for="Note">Note</label>
                            <input type="text" name="note" id="note" class="form-input" placeholder="Gift" required>
                        </div>
                        <div class="set">
                            <label for="GiftCard">Gift Card Code</label>
                            <input type="text" name="giftcard" id="gcard" value="<?= (isset($_SESSION['dashKey'])) ? Session::getSession('dashKey') : "" ?>" class="form-input" placeholder="XXXX XX XXXXX">
                        </div>
                    </div>
                    <div class="form-btn-set">
                        <button type="reset" class="form-btn secondary-btn">Cancle</button>
                        <button type="submit" class="form-btn primary-btn">Transfer</button>
                    </div>
                </div>
            </form>
        </div>
        <?php
        if (isset($_REQUEST['account'])) { ?>
            <dialog class="login-form" open aria-modal="true" id="Confirm">
                <form action="<?= $URL->getController("Transfer", "Transfer") ?>" method="post">
                    <div class="form-segment">
                        <h1 class="segment-title">Are You Sure...</h1>
                        <p class="form-text">
                            Please Confirm Your Transaction To Account <span class="badge success"> <?= $_REQUEST['account'] ?> </span>from your Account <span class="badge sucess"><?= $_SESSION['Account_number'] ?></span> of Amount <span class="badge success"><?= $_REQUEST['amount'] ?></span>
                        </p>
                        <div class="row">
                            <label for="Password">Enter Password</label>
                            <input type="password" name="password" id="psw" class="form-input" placeholder="*****" required>
                        </div>
                        <div class="form-btn-set">
                            <button type="reset" id="cancle" class="form-btn secondary-btn">Cancle</button>
                            <button type="submit" class="form-btn primary-btn">Transfer</button>
                        </div>
                    </div>
                    <input type="hidden" value="<?= $_REQUEST['account'] ?>" name="Account">
                    <input type="hidden" value="<?= $_REQUEST['amount'] ?>" name="Amount">
                    <input type="hidden" value="<?= $_REQUEST['note'] ?>" name="Note">
                    <input type="hidden" value="<?= $_REQUEST['giftcard'] ?>" name="Reward">
                </form>
            </dialog>
        <?php } ?>
    </main>
</body>
<script>
    const CancleBtn = document.querySelector('#cancle');
    CancleBtn.addEventListener('click', () => {
        const Dialog = document.querySelector('#Confirm');
        Dialog.close();
    });
</script>

</html>
<?php
if (isset($_SESSION['dashKey'])) {
    Session::deleteSession("dashKey");
}
?>