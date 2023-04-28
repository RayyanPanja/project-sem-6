<link rel="stylesheet" href="<?= $URL ?>/assets/css/Navbar.css">

<?php include_once('Logout.php'); ?>
<nav class="navbar">
    <div class="link-set" id="set">
        <a href="<?= $URL; ?>/home.php" class="link">Home</a>
        <a href="<?= $URL; ?>/assets/php/Deposit/ui.php" class="link">Deposit Amount</a>
        <a href="<?= $URL; ?>/assets/php/Loan/ui.php" class="link">Loan Applications</a>
        <a href="<?= $URL; ?>/assets/php/Users/ui.php" class="link">User Details</a>
        <a href="<?= $URL; ?>/assets/php/Mail/ui.php" class="link">Mails</a>
        <a href="<?= $URL; ?>/assets/php/Help.php" class="link">Help</a>
    </div>
    <div class="auth-set">
        <button class="nav-login-btn" id="login-open">Logout</button>
    </div>
</nav>

<button class="toggleNav" id="toggleNav">+</button>

<script src="<?= $URL ?>/assets/js/Navbar.js"></script>
