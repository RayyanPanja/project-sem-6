<?php
require "../Classes/All.class.php";
require "../include/include.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Portal</title>
    <link rel="stylesheet" href="<?= $URL->getCss("Style") ?>">
</head>

<body>
    <dialog class="login-form" open>
        <form action="<?= $URL->getController("Security", "Middleware") ?>" method="post">
            <div class="form-segment">
                <h1 class="segment-title">Security Wall</h1>
                <div class="set">
                    <label for="Password">Password</label>
                    <input type="password" name="password" id="psw" class="form-input" placeholder="******">
                </div>
                <div class="form-btn-set">
                    <a href="<?= $URL->getHomePage() ?>" class="form-btn secondary-btn">Cancle</a>
                    <button type="submit" class="form-btn primary-btn">Access</button>
                </div>
            </div>
        </form>
    </dialog>
</body>

</html>