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
    <title>Signup</title>
    <link rel="stylesheet" href="<?= $URL->getCss("Style") ?>">
</head>

<body>

    <?php
    if (Session::Exists("isLoggedin")) {
        include('../component/mainNav.comp.php');
    } else {
        include('../component/indexNav.comp.php');
    }
    ?>

    <main>
        <section class="register-section">
            <div class="register-form-container">
                <div class="form-segment">
                    <h1 class="segment-title">Signup Success</h1>
                    <p class="form-text font-size-big">
                        Registration Successfull , Your Account has been Created in Our Bank ,
                        With Account Number <span class="badge success"><?= Session::getSession('tempAccount') ?></span>
                    </p>
                    <p class="form-text font-size-big">
                        Please Deposit a Minimum of <span class="badge warn"><?= MIN_ACCOUNT_BALANCE ?></span> in Your Account With in 30 Days , To Keep Your Account Active.
                        Else Your Account will be Terminated.
                    </p>
                    <a href="<?= $URL->getHomePage() ?>" class="intro-btn lazy">Return to Home Page</a>
                </div>
            </div>
        </section>
    </main>

</body>
<script src="<?= $URL->getJs("Observer") ?>"></script>

</html>