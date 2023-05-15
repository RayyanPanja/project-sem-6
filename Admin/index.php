<?php
require "app/Classes/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <?= Route::getCSS("Style") ?>
</head>

<body>

    <?php
    include("app/Components/AuthForms.cont.php");

    if (Session::Exists("AdminLoggedin")) {
        include("app/Components/indexNav.cont.php");
    }
    ?>

    <header class="hero-section">
        <?php if (!Session::Exists("AdminLoggedin")) { ?>
            <div class="intro-logo">
                WeBank Admin
            </div>
        <?php } else { ?>
            <div class="intro-logo">
                <button class="logout-btn" id="open-logout-dlg">Logout</button>
            </div>
        <?php } ?>
        <div class="interactable">
            <?php
            if (Session::Exists("AdminLoggedin") && Session::Exists("Admin_Name")) { ?>
                <h1 class="intro-title">Hello <?= Session::getSession("Admin_Name") ?> , <br> Working Hard it Seems</h1>
                <p class="intro-subtitle">
                    Hey <?= Session::getSession("Admin_Name") ?> , Lets Work Hard...
                </p>
            <?php } else { ?>
                <h1 class="intro-title">Hello Human , Please Login So We Can Identify You!</h1>
                <p class="intro-subtitle">
                    Welcome to Admin Panel of WeBank... <br>
                    Login to Proceed Further
                </p>
                <button class="intro-btn" id="open-login-dlg">Login</button>
            <?php } ?>
        </div>
    </header>

</body>
<?= Route::getJS('Dialog') ?>
<script>
    <?php if (!Session::Exists("AdminLoggedin")) { ?>
        DialogHandle('open-login-dlg', 'close-login-dlg', "login-dlg", true);
    <?php } else { ?>
        DialogHandle('open-logout-dlg', 'close-logout-dlg', "logout-dlg", true);
    <?php } ?>
</script>
<?= Route::getJQuery() ?>

</html>