<?php
$URL = new URL;
?>
<link rel="stylesheet" href="<?= $URL->getCss("Navbar") ?>">
<!-- Login Form -->
<dialog class="login-form" id="login-dlg">
    <div class="login-img-holder">
        <img src="<?= $URL->getImgPath('user.png') ?>" alt="Login">
    </div>
    <form action="<?= $URL->getController("login", "auth") ?>" method="post">
        <div class="form-segment">
            <h1 class="segment-title">Login</h1>
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
        </div>
        <div class="form-btn-set">
            <button class="form-btn secondary-btn" type="reset" id="login-close">Cancle</button>
            <button class="form-btn primary-btn" type="submit">Login</button>
        </div>
    </form>
    <div class="text-group">
        <p>Dont have an Account??</p>
        <a href="<?= $URL->getView("Step1", "Register") ?>">Register Now</a>
    </div>
</dialog>
<!-- Login Form...ENDS -->

<nav class="navbar">
    <div class="logo">
        <h1>^w^</h1>
    </div>
    <div class="link-set" id="link-set">
        <a href="<?= $URL->getHomePage(); ?>/index.php" class="link">Home</a>
        <a href="<?= $URL->getHomePage(); ?>/index.php#About" class="link">About</a>
        <a href="<?= $URL->getView("contact", "Contact"); ?>" class="link">Contact</a>
    </div>
    <div class="auth">
        <button id="login-open" class="auth-btn login">Login</button>
        <hr>
        <a href="<?= $URL->getView("Signup", "Register") ?>" id="register-btn" class="auth-btn signup">Register</a>
    </div>
</nav>
<button id="toggleNav" class="toggleNav">+</button>
<script src="<?= $URL->getJs('Navbar') ?>"></script>
<script src="<?= $URL->getJs("Dialog") ?>"></script>
<script>
    DialogHandler('#login-open', '#login-close', '#login-dlg', true);
</script>