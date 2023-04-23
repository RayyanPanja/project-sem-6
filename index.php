<?php
include "assets/php/connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $BANKNAME; ?></title>
    <!-- Icon Library -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css' integrity='sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==' crossorigin='anonymous' />
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- NAVBAR -->
    <?php
    include("assets/components/IndexNavbar.php");
    ?>
    <!-- NAVBAR -->

    <header class="hero" id="home">
        <h1 class="intro-title lazy">We Provide Security</h1>
        <div class="small-txt-group lazy">
            <p class="small-txt lazy delay-short">Think Banking Can't be fast , flexible, and Transparent ? </p>
            <p class="small-txt lazy delay-short">Think again. Open an Account Today to Experience Remote Banking</p>
            <button class="lazy delay-long cool-big-btn" id="register-btn-2">Open your account</button>
        </div>
        <div class="img-holder lazy">
            <img src="assets/img/hand.png" alt="">
        </div>
    </header>
    <section id="about">
        <h1 class="page-title lazy">About us</h1>
        <div class="about-small-txt-group lazy">
            <p class="about-small-txt lazy delay">
                "At <?php echo $BANKNAME; ?>, we believe in providing our customers with the best banking experience possible. As a community bank, we are dedicated to serving the financial needs of our local area and building long-term relationships with our customers. Our team of experienced professionals is committed to providing personalized service and expert financial advice. We offer a wide range of products and services, including checking and savings accounts, loans, mortgages, and investment options. Trust us to be your partner in managing your financial future."
            </p>
        </div>
    </section>

    <section id="services">
        <h1 class="page-title lazy">Services</h1>
        <div class="service-grid lazy">

            <div class="service-card lazy delay-short">
                <h1 class="service-name lazy delay">
                    Credit Services
                </h1>
                <p class="service-detail lazy delay">
                    personal loans, mortgages, home equity loans, and lines of credit.
                </p>
            </div>

            <div class="service-card lazy delay-short">
                <h1 class="service-name lazy delay-long">
                    Online and mobile banking
                </h1>
                <p class="service-detail lazy delay-long">
                    Allowing customers to access their accounts, pay bills, transfer money and make transactions online or through mobile apps.
                </p>
            </div>

            <div class="service-card lazy delay-short">
                <h1 class="service-name lazy delay-2">
                    Insurance products
                </h1>
                <p class="service-detail lazy delay-2">
                    such as life, health, and property insurance.
                </p>
            </div>

            <div class="service-card lazy delay-short">
                <h1 class="service-name lazy delay-3">
                    Depository Services
                </h1>
                <p class="service-detail lazy delay-3">
                    such as checking and savings accounts, certificates of deposit (CDs), and individual retirement accounts (IRAs).
                </p>
            </div>
        </div>
    </section>

    <!-- Footer.. -->
    <?php include("assets/components/Footer.php"); ?>
    <!-- Footer.. -->
    <script>
        const NavbarRegisterBtn = document.querySelector('#register-btn');
        const HomeRegisterBtn = document.querySelector('#register-btn-2');

        if (NavbarRegisterBtn != null || HomeRegisterBtn != null) {
            NavbarRegisterBtn.addEventListener('click', () => {
                window.location.assign("assets/php/register/step1.php");
            });
            HomeRegisterBtn.addEventListener('click', () => {
                window.location.assign("assets/php/register/step1.php");
            });

        }
    </script>
    <script src="assets/js/Observer.js"></script>
</body>

</html>