<?php
require 'back_end/Classes/All.class.php';
require "back_end/include/include.php";
$URL = new URL();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="<?= $URL->getCss('Style') ?>">
</head>

<body>
    <!-- Including Navbar -->
    <?php
    if (Auth::isauth()) { ?>
        <?php include "src/view/component/mainNav.comp.php"; ?>
    <?php } else { ?>
        <?php include "src/view/component/indexNav.comp.php"; ?>
    <?php }
    ?>
    <!-- Including Header -->
    <?php include "src/view/component/Hero.comp.php"; ?>

    <section id="About">
        <h1 class="section-title lazy">About</h1>
        <div class="text-group lazy">
            <p class="about-text">
                "At <?= Connection::getAppName() ?>, we believe in providing our customers with the best banking experience possible. As a community bank, we are dedicated to serving the financial needs of our local area and building long-term relationships with our customers. Our team of experienced professionals is committed to providing personalized service and expert financial advice. We offer a wide range of products and services, including checking and savings accounts, loans, mortgages, and investment options. Trust us to be your partner in managing your financial future."
            </p>
        </div>
    </section>
    <section id="Services">
        <h1 class="section-title lazy">Services</h1>
        <div class="services-grid">
            <div class="service lazy">
                <h2 class="service-name">
                    Credit Services
                </h2>
                <div class="service-desc">
                    personal loans, mortgages, home equity loans, and lines of credit.
                </div>
            </div>

            <div class="service lazy">
                <h2 class="service-name">
                    Online and mobile banking
                </h2>
                <div class="service-desc">
                    Allowing customers to access their accounts, pay bills, transfer money and make transactions online or through mobile apps.
                </div>
            </div>

            <div class="service lazy">
                <h2 class="service-name">
                    Depository Services
                </h2>
                <div class="service-desc">
                    such as checking and savings accounts, certificates of deposit (CDs), and individual retirement accounts (IRAs).
                </div>
            </div>

            <div class="service lazy">
                <h2 class="service-name">
                    Insurance products
                </h2>
                <div class="service-desc">
                    such as life, health, and property insurance.
                </div>
            </div>
        </div>
    </section>

    <script src="<?= $URL->getJs("Observer") ?>"></script>

</body>

</html>