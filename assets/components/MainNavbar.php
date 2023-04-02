<!-- Logout Form -->
<dialog class="login-form" id="logout-dlg">
    <div class="login-img-holder">
        <img src="<?= $URL ?>/assets/img/storage/<?= $_SESSION['image']; ?>" alt="Login">
    </div>
    <h1>Logout</h1>
    <form action="<?= $URL ?>/assets/php/auth/logout.php" method="post">
        <h1>Are You Sure You Want to Logout </h1>
        <div class="login-btn-set">
            <button class="login-btn cool-btn" type="submit">Logout</button>
            <button class="cancle-btn cool-btn" type="reset" id="logout-close">Cancle</button>
        </div>
    </form>
</dialog>
<!-- Logout Form...ENDS -->

<nav class="navbar">
    <div class="logo">
        <h1>^w^</h1>
    </div>
    <div class="link-set">
        <a href="<?= $URL; ?>/assets/php/dashboard/dashboard.php" class="link">DashBoard</a>
        <a href="<?= $URL; ?>/assets/php/transfer/ui.php" class="link">Transfer</a>
        <a href="<?= $URL; ?>/assets/php/loan/ui.php" class="link">Loan</a>
        <a href="<?= $URL; ?>/assets/php/balance/ui.php" class="link">Balance</a>
        <a href="<?= $URL; ?>/assets/php/contact/ui.php" class="link">Contact</a>
        <a href="<?= $URL; ?>/assets/php/settings/ui.php" class="link">Settings</a>
        <button type="submit" class="logout-btn" id="logout-open">Logout</button>
    </div>
    <div class="auth">
        <div class="user-detail-box">
            <div class="user-img-holder">
                <img src="<?= $URL . "/assets/img/storage/" . $_SESSION['image']; ?>" alt="<?php echo $SirName . $Name . $FatherName; ?>">
            </div>
            <div class="">
                <h1 class="user-name" title="<?= $_SESSION['Email'] ?>">
                    <?= $_SESSION['Name']; ?>
                </h1>
            </div>
        </div>
    </div>
</nav>

<script src="<?= $URL ?>/assets/js/Dialog.js"></script>
<script>
    DialogHandler('logout-open', 'logout-close', 'logout-dlg', true);
</script>