<?php
require "../../app/Classes/autoload.php";

$BankTable = new Table("bank", "Account");
$BankData = $BankTable->select()->execute_query()[0];

$UserTable = new Table("main", "Account_number");
$Users = $UserTable->select()->order_by("Amount")->execute_query();
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
        <div class="bank-container">
            <h1 class="bank-name">Bank: <?= Connection::getAppName() ?></h1>
            <div class="screen">
                <div class="inputs">

                    <div class="row">
                        <div class="set">
                            <label for="Total">Amount in Entire Bank</label>
                            <input type="text" class="bank-input <?= ($BankData["Amount"] >= $BankData["Amount_Before"]) ? "text-success" : "text-alert" ?>" value="<?= $BankData["Amount"] ?>/-" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="set">
                            <label for="Before">Amount Before Refresh</label>
                            <input type="text" class="bank-input <?= ($BankData["Amount_Before"] <= $BankData["Amount"]) ? "text-success" : "text-alert" ?>" value="<?= $BankData["Amount_Before"] ?>/-" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="set">
                            <label for="Gap">Gap Between Referesh</label>
                            <input type="text" class="bank-input text-warn ?>" value="<?= $BankData["Gap"] ?>/-" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="set">
                            <label for="Status">Status: Profit Or Loss</label>
                            <input type="text" class="bank-input <?= ($BankData["Amount"] >= $BankData["Amount_Before"]) ? "text-success" : "text-alert" ?>" value="<?= ($BankData["Amount"] >= $BankData["Amount_Before"]) ? "Profit" : "Loss" ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="details">
                    <h1 class="text-center">Leaderboard</h1>
                    <table>
                        <tr>
                            <th>Rank</th>
                            <th>Account Number</th>
                            <th>Name</th>
                            <th>Amount</th>
                        </tr>
                        <?php
                        for ($i = 0; $i < count($Users); $i++) { ?>
                            <tr>
                                <td>#<?= $i + 1?></td>
                                <td><?= $Users[$i]['Account_number'] ?></td>
                                <td><?= $Users[$i]['Sirname'] ?> <?= $Users[$i]['Firstname'] ?> <?= $Users[$i]['Fathername'] ?></td>
                                <td><?= $Users[$i]['Amount'] ?></td>
                            </tr>
                        <?php }  ?>
                    </table>
                </div>
            </div>
            <form action="<?= Route::getController("refereshBank", "ManageBank") ?>" method="post">
                <button type="submit" class="form-btn primary-btn">Referesh</button>
            </form>
        </div>
    </main>
</body>

</html>