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
    <title>Contact us</title>
    <link rel="stylesheet" href="<?= $URL->getCss("Style") ?>">
</head>

<body>

    <?php
    if (Session::Exist("isLoggedin")) {
        include("../component/mainNav.comp.php");
    } else {
        include("../component/IndexNav.comp.php");
    }
    ?>
    <main>
        <section class="contact-section">
            <div class="contact-form-container">
                <div class="form-segment">
                    <h1 class="segment-title">Review Sent , We Soon Respond to You</h1>
                    <a href="<?= $URL->getView("Dashboard", "Dashboard") ?>" class="form-btn primary-btn">Return to Dashboard</a>

                </div>
            </div>
        </section>
    </main>

</body>

</html>