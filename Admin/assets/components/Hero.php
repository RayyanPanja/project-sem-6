<link rel="stylesheet" href="<?= $URL ?>/assets/css/Hero.css">

<!-- Login Form -->
<dialog class="login-form" id="login-dlg">
    <h1>Login</h1>
    <form action="<?= $URL ?>/assets/php/Auth/login.php" method="post">
        <div class="row">
            <div class="set">
                <label for="Account Number">Account Number</label>
            </div>
            <div class="set">
                <input type="number" name="account" id="accno" class="form-input" placeholder="Account Number" required>
            </div>
        </div>
        <div class="row">
            <div class="set">
                <label for="Password">Password</label>
            </div>
            <div class="set">
                <input type="password" name="password" id="psw" class="form-input" placeholder="******" required>
            </div>
        </div>
        <div class="form-btn-set">
            <button class="form-btn primary-btn" type="submit">Login</button>
            <button class="form-btn secondary-btn   " type="reset" id="login-close">Cancle</button>
        </div>
    </form>
    <div class="small-txt-set for-login">
        <p class="small-txt">if you Dont have an Account??</p>
        <a href="">Request Now</a>
    </div>
</dialog>

<header class="hero">
    <h1 class="intro-title"><?= $AppName; ?></h1>
    <button class="hero-" id="login-open" >Login</button>
</header>

<script src="<?= $URL ?>/assets/js/Function.js"></script>
<script>
    DialogHandler('#login-open', 'login-close', 'login-dlg', true);
</script>