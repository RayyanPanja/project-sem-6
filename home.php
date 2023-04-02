<?php
include "assets/php/connection.php";
 
$Account = $_SESSION['Account'];
$SirName = $_SESSION['Sirname'];
$Name = $_SESSION['Name'];
$FatherName = $_SESSION['Father'];
$Image = $_SESSION['image'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $Name; ?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Logout Form -->
    <dialog class="login-form" id="logout-dlg">
        <div class="login-img-holder">
            <img src="assets/img/storage/<?php echo $Image; ?>" alt="Login">
        </div>
        <h1>Logout</h1>
        <form action="assets/php/auth/logout.php" method="post">
            <h1>Are You Sure You Want to Logout </h1>
            <div class="login-btn-set">
                <button class="login-btn cool-btn" type="submit">Logout</button>
                <button class="cancle-btn cool-btn" type="reset" id="logout-close">Cancle</button>
            </div>
        </form>
    </dialog>
    <!-- Logout Form...ENDS -->
    
    <!-- NAVBAR -->
    <?php
    include("assets/components/MainNavbar.php");
    ?>
    <!-- NAVBAR -->

    <header class="hero" id="home">
        <h1 class="intro-title">We Provide Security</h1>
        <div class="small-txt-group">
            <p class="small-txt">Enjoy fast , flexible, and Transparent Banking </p>
            <p class="small-txt">Thank you For Being a Valuable Customer.</p>
            <p class="small-txt">Try Exploring Your Dashboard </p>
        </div>
        <button class="cool-big-btn" id="dashboard-btn">Go to Dashboard</button>
        <div class="img-holder">
            <img src="assets/img/hand.png" alt="">
        </div>
    </header>
    <section id="about">
        <h1 class="page-title">About us</h1>
        <div class="about-small-txt-group">
            <p class="about-small-txt">
                "At <?php echo $BANKNAME; ?>, we believe in providing our customers with the best banking experience possible. As a community bank, we are dedicated to serving the financial needs of our local area and building long-term relationships with our customers. Our team of experienced professionals is committed to providing personalized service and expert financial advice. We offer a wide range of products and services, including checking and savings accounts, loans, mortgages, and investment options. Trust us to be your partner in managing your financial future."
            </p>
        </div>

    </section>

    <section id="services">
        <h1 class="page-title">Services</h1>
        <div class="service-grid">

            <div class="service-card">
                <h1 class="service-name">
                    Credit Services
                </h1>
                <p class="service-detail">
                    personal loans, mortgages, home equity loans, and lines of credit.
                </p>
            </div>

            <div class="service-card">
                <h1 class="service-name">
                    Online and mobile banking
                </h1>
                <p class="service-detail">
                    Allowing customers to access their accounts, pay bills, transfer money and make transactions online or through mobile apps.
                </p>
            </div>

            <div class="service-card">
                <h1 class="service-name">
                    Insurance products
                </h1>
                <p class="service-detail">
                    such as life, health, and property insurance.
                </p>
            </div>

            <div class="service-card">
                <h1 class="service-name">
                    Depository Services
                </h1>
                <p class="service-detail">
                    such as checking and savings accounts, certificates of deposit (CDs), and individual retirement accounts (IRAs).
                </p>
            </div>
        </div>
    </section>

    <!-- Footer.. -->
    <?php include("assets/components/Footer.php"); ?>
    <!-- Footer.. -->

    <script src="assets/js/Dialog.js"></script>
    <script>
        DialogHandler('logout-open', 'logout-close', 'logout-dlg', true);
        const DashboardBtn = document.querySelector('#dashboard-btn');
        DashboardBtn.addEventListener('click', () => {
            window.location.assign("assets/php/dashboard/dashboard.php");
        });
    </script>
</body>

</html>