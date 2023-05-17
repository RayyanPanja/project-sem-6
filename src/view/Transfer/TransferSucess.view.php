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
    <title>Success</title>

    <link rel="stylesheet" href="<?= $URL->getCss("Style") ?>">
</head>

<body>
    <?php include('../component/mainNav.comp.php') ?>
    <main>
        <section class="p-t-5 grid-center">
            <?php
            if (isset($_SESSION['RewardKey'])) {
            ?>
                <div class="card-wrapper" id="card-wrap">
                    <div class="card-container" id="scard">
                        <button class="x-btn" id="x-btn">X</button>
                        <div class="card-details" id="det">
                            <div class="design-input"><?= Session::getSession("RewardKey") ?> </div>
                            <h2>CashBack Coupen: <?= Session::getSession("Reward") ?> </h2>
                            <h2>Reward Expires: <?= Session::getSession("RewardExpire") ?></h2>
                        </div>
                        <div class="overlay" id="overlay">
                            <h1>Scratch it!!!</h1>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="transfer-details-wrapper">
                <h1 class="transfer-heading">Transfer SuccessFull</h1>
                <?php
                $UserTable = new Table("main", "Account_number");
                $TransacTable = new Table("transaction", "Receipt_No");

                $User = $UserTable->select()->where("Account_number", Session::getSession("Account_number"))->execute_query()[0];
                $Transac = $TransacTable->select()->where("Receipt_No", Session::getSession("tempReceipt"))->execute_query()[0];
                ?>
                <div class="transfer-text">
                    <div class="header-text">
                        Dear <?= Session::getSession("Firstname") ?>, <br>
                    </div>
                    <div class="subject">
                        This is to inform you that a successful transaction has been made from your account. Please find the details below:
                    </div>
                    <div class="details">
                        <table border="2">
                            <tr>
                                <th class="badge"> Reference Number </th>
                                <td class="badge success"><?= $Transac["Receipt_No"] ?></td>
                            </tr>
                            <tr>
                                <th class="badge"> Recipient </th>
                                <td class="badge success"><?= $Transac["Receiver"] ?></td>
                            </tr>
                            <tr>
                                <th class="badge"> Amount </th>
                                <td class="badge alert"><?= $Transac["Amount"] ?></td>
                            </tr>
                            <tr>
                                <th class="badge"> Date and Time </th>
                                <td class="badge success"><?= $Transac["DateTime"] ?></td>
                            </tr>
                        </table>
                    </div>
                    <p>
                        If you have any questions or concerns regarding this transaction, please feel free to contact our <a href="<?= $URL->getView("contact","Contact")?>" class="white">customer support</a>.
                    </p>
                    <p>
                        Thank you for using our banking services!
                    </p>
                    <div class="regards">
                        <div>
                            Best regards,
                        </div>
                        <div>
                            ~<?= Connection::getAppName() ?>
                        </div>
                    </div>

                </div>

            </div>

        </section>
    </main>
</body>
<script src="<?= $URL->getJs("ScratchCard") ?>"></script>

</html>
<?php
Session::deleteSession("RewardKey");
Session::deleteSession("Reward");
Session::deleteSession("RewardExpire");
?>