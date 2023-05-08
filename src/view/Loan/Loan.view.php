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
    <title>Loan Application</title>
    <link rel="stylesheet" href="<?= $URL->getCss("Style") ?>">
</head>

<body>
    <?php include('../component/mainNav.comp.php'); ?>
    <main>
        <section class="grid-center">
            <div class="loan-form-container">
                <form action="<?= $URL->getController("Step1", "Loan") ?>" method="post">
                    <div class="form-segment">
                        <h1 class="segment-title">Account Details</h1>
                        <div class="multi-row">
                            <div class="set">
                                <label for="Account_Number">Account Number</label>
                                <input type="number" name="account" id="accno" class="form-input" placeholder="e.g.<?= Jumble(Session::getSession('Account_number') * 5) ?>">
                            </div>
                            <div class="set">
                                <label for="Username">Username</label>
                                <input type="text" name="username" id="username" class="form-input" placeholder="User@1345">
                            </div>
                        </div>
                        <div class="row">
                            <div class="set">
                                <label for="Password">Password</label>
                                <input type="password" name="password" id="password" class="form-input" placeholder="*****">
                            </div>
                        </div>
                    </div>
                    <div class="form-btn-set bottom-right">
                        <button type="reset" class="form-btn secondary-btn">Cancle</button>
                        <button type="submit" class="form-btn primary-btn">Next</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>