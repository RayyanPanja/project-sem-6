<link rel="stylesheet" href="<?= $URL ?>/assets/css/Hero.css">

<!-- Login Form -->
<dialog class="login-form" id="login-dlg">
    <h1>Logout</h1>
    <h1 class="alert-text">Are You Sure!!</h1>
    <form action="<?= $URL ?>/assets/php/Auth/logout.php" method="post">
        <div class="form-btn-set">
            <button class="form-btn primary-btn" type="submit">Logout</button>
            <button class="form-btn secondary-btn   " type="reset" id="login-close">Cancle</button>
        </div>
    </form>
</dialog>
<!-- Login Form...ENDS -->

<header class="hero">
    <h1 class="intro-title"><?= $AppName; ?></h1>
    <button class="hero-" id="login-open" >Logout</button>
</header>

<script src="<?= $URL ?>/assets/js/Function.js"></script>
<script>
    DialogHandler('#login-open', 'login-close', 'login-dlg', true);
</script>