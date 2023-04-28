<!-- Logout Form -->
<dialog class="login-form" id="logout-dlg">
    <div class="login-img-holder">
        <img src="<?= $URL ?>/assets/img/storage/<?= $_SESSION['Img_Path']; ?>" alt="Login">
    </div>
    <h1>Logout</h1>
    <form action="<?= $URL ?>/assets/php/auth/logout.php" method="post">
        <h1>Are You Sure You Want to Logout </h1>
        <div class="form-btn-set">
            <button class="form-btn primary-btn" type="submit">Logout</button>
            <button class="form-btn secondary-btn   " type="reset" id="logout-close">Cancle</button>
        </div>
    </form>
</dialog>
<!-- Logout Form...ENDS -->

<nav class="navbar">
    <div class="logo">
        <h1>^w^</h1>
    </div>
    <div class="link-set" id="set">
        <a href="<?= $URL; ?>/assets/php/dashboard/dashboard.php" class="link">DashBoard</a>
        <a href="<?= $URL; ?>/assets/php/transfer/ui.php" class="link">Transfer</a>
        <a href="<?= $URL; ?>/assets/php/loan/ui.php" class="link">Loan</a>
        <a href="<?= $URL; ?>/assets/php/pin.php" class="link">Balance</a>
        <a href="<?= $URL; ?>/assets/php/contact/ui.php" class="link">Contact</a>
        <a href="<?= $URL; ?>/assets/php/settings-psw.php" class="link">Settings</a>
        <button type="submit" class="logout-btn" id="logout-open">Logout</button>
    </div>
    <div class="auth">
        <div class="user-detail-box">
            <div class="user-img-holder">
                <img src="<?= $URL . "/assets/img/storage/" . $_SESSION['Img_Path']; ?>" alt="<?php echo $SirName . $Name . $FatherName; ?>">
            </div>
            <div class="">
                <h1 class="user-name" title="<?= $_SESSION['Email'] ?>">
                    <?= $_SESSION['Firstname']; ?>
                </h1>
            </div>
        </div>
    </div>
</nav>

<button class="toggleNav" id="toggleNav"> <b>+</b></button>

<script src="<?= $URL ?>/assets/js/Func.js"></script>
<script>
    DialogHandler('logout-open', 'logout-close', 'logout-dlg', true);
</script>

<script src="<?= $URL ?>/assets/js/Navbar.js"></script>