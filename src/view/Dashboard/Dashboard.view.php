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
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= $URL->getCss("Style") ?>">
    <link rel="stylesheet" href="<?= $URL->getCss("Dashboard") ?>">
</head>

<body>

    <main class="grid-with-side-nav">
        <!-- SideNav -->
        <?php include("dash-components/DashboardNav.comp.php") ?>
        <!-- SideNav -->
        <section class="panel">
            <section class="notification-section">

                <?php include("dash-components/Notification.comp.php"); ?>

                <section class="transaction-section">
                    <?php include("dash-components/Transactions.comp.php"); ?>
                </section>
            </section>

            <section class="inventory-section" id="inventory">
                <?php include("dash-components/Inventory.comp.php"); ?>
            </section>

            <section id="Loan">
                <?php include("dash-components/Loan.comp.php"); ?>
            </section>

            <section id="Review">
                <?php include("dash-components/Contact.comp.php"); ?>
            </section>

        </section>
    </main>
</body>


</html>