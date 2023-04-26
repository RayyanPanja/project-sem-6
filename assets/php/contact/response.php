<?php
include "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

</head>

<body>

    <?php
    if ($_SESSION['Loggedin'] == boolval(true)) { ?>
        <?php include('../../components/MainNavbar.php'); ?>
    <?php }
    ?>
    <?php
    if ($_SESSION['Loggedin'] == boolval(false)) { ?>
        <button class="cool-big-btn" onclick="goToHome()" id="Home">Go Back</button>
    <?php }
    ?>

    <div class="signup-form-container flex flex-col flex-ju-ce flex-al-ce ">
        <h1 align="center">Your Message has Been Delivered, Soon We Will Respond to Your Email</h1>
        <h1 align="center">Thanks you</h1>
    </div>


    </main>

</body>


</html>