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