<?php
$URL = new URL;
?>
<link rel="stylesheet" href="<?= $URL->getCss("Navbar") ?>">
<!-- Logout Form -->
<dialog class="login-form" id="logout-dlg">
    <div class="login-img-holder">
        <img src="<?= $URL->getStorage() ?>/profiles/<?= $_SESSION['Img_Path']; ?>" alt="Login">
    </div>
    <h1>Logout</h1>
    <form action="<?= $URL->getController("logout", "auth") ?>" method="post">
        <h1>Are You Sure You Want to Logout </h1>
        <div class="form-btn-set">
            <button class="form-btn primary-btn" type="submit">Logout</button>
            <button class="form-btn secondary-btn" type="reset" id="logout-close">Cancle</button>
        </div>
    </form>
</dialog>
<!-- Logout Form...ENDS -->

<nav class="navbar">
    <div class="logo">
        <h1>^w^</h1>
    </div>
    <div class="link-set" id="link-set">
        <a href="<?= $URL->getView('Dashboard', "Dashboard") ?>" class="link">DashBoard</a>
        <a href="<?= $URL->getView('Transfer', "Transfer") ?>" class="link">Transfer</a>
        <a href="<?= $URL->getView('Loan', "Loan") ?>" class="link">Loan</a>
        <a href="<?= $URL->getView('Balance', "Balance") ?>" class="link">Balance</a>
        <a href="<?= $URL->getView('Contact', "Contact") ?>" class="link">Contact</a>
        <a href="<?= $URL->getView('Settings', "Settings") ?>" class="link">Settings</a>
        <button type="submit" class="logout-btn" id="logout-open">Logout</button>
    </div>
    <div class="auth">
        <div class="user-detail-box">
            <div class="user-img-holder">
                <img src="<?= $URL->getProfileImage($_SESSION['Img_Path']) ?>" alt="Pfp">
            </div>
            <div class="">
                <h1 class="user-name" title="<?= $_SESSION['Email'] ?>">
                    <?= $_SESSION['Firstname']; ?>
                </h1>
            </div>
        </div>
    </div>
</nav>

<button class="toggleNav" id="toggleLink"> <b>+</b></button>

<script src="<?= $URL->getJs("Navbar") ?>"></script>
<script src="<?= $URL->getJs("Dialog") ?>"></script>
<script>
    DialogHandler('#logout-open', '#logout-close', '#logout-dlg', true);
</script>