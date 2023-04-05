<!-- Login Form -->
<dialog class="login-form" id="login-dlg">
    <div class="login-img-holder">
        <img src="<?= $URL ?>/assets/img/user.png" alt="Login">
    </div>
    <h1>Login</h1>
    <form action="<?= $URL ?>/assets/php/auth/login.php" method="post">
        <div class="row">
            <div class="col-lab">
                <label for="Account Number">Account Number</label>
            </div>
            <div class="col-inp">
                <input type="number" name="account" id="accno" class="login-input" placeholder="Account Number" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lab">
                <label for="Password">Password</label>
            </div>
            <div class="col-inp">
                <input type="password" name="password" id="psw" class="login-input" placeholder="******" required>
            </div>
        </div>
        <div class="login-btn-set">
            <button class="login-btn cool-btn" type="submit">Login</button>
            <button class="cancle-btn cool-btn" type="reset" id="login-close">Cancle</button>
        </div>
    </form>
    <div class="small-txt-set for-login">
        <p class="small-txt">Dont have an Account??</p>
        <a href="">Register Now</a>
    </div>
</dialog>
<!-- Login Form...ENDS -->

<nav class="navbar">
    <div class="logo">
        <h1>^w^</h1>
    </div>
    <div class="link-set">
        <a href="<?= $URL; ?>/index.php" class="link">Home</a>
        <a href="<?= $URL; ?>/index.php#about" class="link">About</a>
        <a href="<?= $URL; ?>/assets/php/contact/ui.php" class="link">Contact</a>

    </div>
    <div class="auth">
        <button id="login-open" class="auth-btn login">Login</button>
        <hr>
        <button id="register-btn" class="auth-btn signup">Register</button>
    </div>
</nav>


<script src="<?= $URL ?>/assets/js/Func.js"></script>
<script>
    DialogHandler('login-open', 'login-close', 'login-dlg', true);
</script>