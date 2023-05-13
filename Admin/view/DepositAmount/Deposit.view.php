<?php
require "../../app/Classes/autoload.php";

$UserTable = new Table("main", "Account_number");
$User = $UserTable->select()->get_data_from_primary(Session::get_Session("AccountDetails"));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Details Of User</title>
    <?= Route::getCSS("Style") ?>
</head>

<body>
    <?php include("../../app/Components/AuthForms.cont.php"); ?>
    <?php include("../../app/Components/indexNav.cont.php"); ?>
    <main class="padding-top">
        <section>
            <div class="deposit-form-container">
                <form action="<?= Route::getController("Deposit", "DepositControllers") ?>" method="post">
                    <div class="form-segment">
                        <h1 class="segment-title">Deposit Amount</h1>
                        <div class="row">
                            <div class="set">
                                <label for="Account">Account Number</label>
                                <input type="number" name="account" id="account" class="form-input" placeholder="Account to Deposit Amount" value="<?= Session::get_Session("AccountDetails") ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="set">
                                <label for="Amount">Amount</label>
                                <input type="number" name="amount" id="amount" class="form-input" placeholder="Amount to Deposit" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="set">
                                <label for="Confirm">Confirm Amount</label>
                                <input type="number" name="confirm" id="Confirm" placeholder="Confirm Amount" class="form-input">
                            </div>
                        </div>
                    </div>
                    <div class="form-btn-set">
                        <button type="reset" class="form-btn secondary-btn">Cancle</button>
                        <button type="submit" class="form-btn primary-btn">Deposit</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>