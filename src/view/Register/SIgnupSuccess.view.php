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
    if (Session::Exist("isLoggedin")) {
        include('../component/mainNav.comp.php');
    } else {
        include('../component/indexNav.comp.php');
    }
    ?>

    <main>
        <section class="register-section">
            <div class="register-form-container">
                <form action="<?= $URL->getController("Register3", "Register") ?>" method="post">
                    <div class="form-segment">
                        <h1 class="segment-title">Signup Success</h1>
                    </div>
                </form>
            </div>
        </section>
    </main>

</body>

</html>