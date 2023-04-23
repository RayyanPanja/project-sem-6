<link rel="stylesheet" href="<?= $URL ?>/assets/css/Navbar.css">
<link rel="stylesheet" href="<?= $URL ?>/assets/css/FormCompo.css">

<!-- Login Form -->
<dialog class="login-form" id="login-dlg">
    <h1>Logout</h1>
    <h2 class="alert-text">Are You Sure!!</h2>
    <form action="<?= $URL ?>/assets/php/Auth/logout.php" method="post">
        <div class="login-btn-set">
            <button class="login-btn cool-btn" type="submit">Logout</button>
            <button class="cancle-btn cool-btn" type="reset" id="login-close">Cancle</button>
        </div>
    </form>
</dialog>
<!-- Login Form...ENDS -->

<nav class="navbar">
    <div class="link-set">
        <a href="<?= $URL; ?>/home.php" class="link">Home</a>
        <a href="<?= $URL; ?>/assets/php/Deposit/ui.php" class="link">Deposit Amount</a>
        <a href="<?= $URL; ?>/assets/php/Loan/ui.php" class="link">Loan Applications</a>
        <a href="<?= $URL; ?>/assets/php/Users/ui.php" class="link">User Details</a>
        <a href="<?= $URL; ?>/assets/php/Help.php" class="link">Help</a>
    </div>
    <div class="auth-set">
        <button class="nav-login-btn" id="login-open">Logout</button>
    </div>
</nav>
<script src="<?= $URL ?>/assets/js/Function.js"></script>
<script>
    DialogHandler('#login-open', 'login-close', 'login-dlg', true);
</script>