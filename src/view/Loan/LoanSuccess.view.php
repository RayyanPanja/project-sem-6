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
                <h1 class="segment-title">Applied For Loan SuccessFullyyyy</h1>
                <p class="form-text">
                    Applied for Loan Successfully with You Application No. <span class="success badge"> <?= Session::getSession('tempAppID') ?> </span>, wait till you get response from our Bank.
                </p>
                <div class="set">
                    <a href="<?= $URL->getHomePage() ?>" class=" w-100 text-center form-btn primary-btn">Go Back</a>
                </div>
            </div>
        </section>
    </main>
</body>
<script src="<?= $URL->getJs("FileInput") ?>"></script>

</html>