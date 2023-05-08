<?php
$URL = new URL;
?>
<header class="hero-section">
    <div class="intro-text-set">
        <h1 class="intro-heading lazy">We Provide Security</h1>
        <div class="text-group lazy">
            <?php if (isset($_SESSION['isLoggedin']) && $_SESSION['isLoggedin'] === boolval(true)) { ?>
                <p class="intro-text">
                    Thank you For Being a Valueable Custome.
                </p>
                <p class="intro-text">
                    Try Checking out you Dashboard
                </p>
            <?php } else { ?>
                <p class="intro-text">
                    Think Banking Can't be fast , flexible, and Transparent ?
                </p>
                <p class="intro-text">
                    Think again. Open an Account Today to Experience Remote Banking
                </p>
            <?php } ?>
        </div>
        <?php if (isset($_SESSION['isLoggedin']) && $_SESSION['isLoggedin'] === boolval(true)) { ?>
            <a href="<?= $URL->getView("Dashboard", "Dashboard") ?>" class="intro-btn lazy">Check Out Dashboard</a>
        <?php } else { ?>
            <a href="<?= $URL->getView("Signup", "Register") ?>" class="intro-btn lazy">Start New Account</a>
        <?php } ?>
    </div>
    <div class="intro-img-wrapper">
        <img src="<?= $URL->getImgPath('hand.png') ?>" alt="">
    </div>
</header>