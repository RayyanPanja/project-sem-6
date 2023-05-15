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
    <title>Settings</title>
    <?= Route::getCSS("Style") ?>
    <?= Route::getCSS("Dashboard") ?>
    <?= Route::getCSS("Settings") ?>
</head>

<body>
    <main class="settings-grid">
        <?php include("components/profile_nav.comp.php"); ?>
        <section class="scroll-able">
            <?php include("components/update.comp.php"); ?>
        </section>

    </main>
</body>

</html>