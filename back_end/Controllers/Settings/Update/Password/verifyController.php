<?php
require "../../../../Classes/All.class.php";
require "../../../../include/include.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Wall</title>
</head>

<body>

    <dialog class="login-form" open>
        <form action="" method="post">
            <div class="form-segment">
                <h1 class="segment-title">Verify its you</h1>
                <div class="set">
                    <label for="Password">Current Password</label>
                    <input type="password" name="password" id="psw" class="form-input" placeholder="******">
                    <?php if (Session::Exists("error")) { ?>
                        <p class="error"><?= Session::getSession("error") ?></p>
                    <?php } ?>
                </div>
                <div class="form-btn-set">
                    <a href="<?= $URL->getHomePage() ?>" class="form-btn secondary-btn">Cancle</a>
                    <button type="submit" class="form-btn primary-btn">Verify</button>
                </div>
            </div>
        </form>
    </dialog>

</body>

</html>
<?php

if (isset($_REQUEST['password'])) {
    $Password = $_REQUEST['password'];
    if (Session::Exists("error")) {
        Session::deleteSession("error");
    }
    if ($Password === Session::getSession("Password")) {
        justChangePath(Route::getView("Change", "Settings/Password"));
    } else {
        Session::setSession("error", "password incorrect");
    }
}

?>