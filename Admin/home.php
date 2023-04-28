<?php include_once('assets/php/connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?= $_SESSION['AdminName']; ?></title>
</head>
<body>
    <?php include_once('assets/components/MainNavbar.php'); ?>
    <?php include_once('assets/components/HomeHero.php'); ?>
    
</body>
</html>