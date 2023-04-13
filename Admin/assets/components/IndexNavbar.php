<link rel="stylesheet" href="<?= $URL ?>/assets/css/Navbar.css">
<link rel="stylesheet" href="<?= $URL ?>/assets/css/FormCompo.css">

<!-- Login Form -->
<dialog class="login-form" id="login-dlg">
    <h1>Login</h1>
    <form action="<?= $URL ?>/assets/php/Auth/login.php" method="post">
        <div class="row">
            <div class="col-lab">
                <label for="Admin ID">Admin ID</label>
            </div>
            <div class="col-inp">
                <input type="number" name="adminid" class="form-input" placeholder="Admin ID" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lab">
                <label for="Password">Password</label>
            </div>
            <div class="col-inp">
                <input type="password" name="password" id="psw" class="form-input" placeholder="******" required>
            </div>
        </div>
        <div class="login-btn-set">
            <button class="login-btn cool-btn" type="submit">Login</button>
            <button class="cancle-btn cool-btn" type="reset" id="login-close">Cancle</button>
        </div>
    </form>
    <div class="small-txt-set for-login">
        <p class="small-txt">if you Dont have an Account??</p>
        <a href="">Request Now</a>
    </div>
</dialog>
<!-- Login Form...ENDS -->

<nav class="navbar">
    <div class="link-set">
        <a href="<?= $URL ?>/index.php" class="link">Home</a>
        <a href="<?= $URL ?>/Help.php" class="link">Help</a>
    </div>
    <div class="auth-set">
        <button class="nav-login-btn" id="login-open">Login</button>
    </div>
</nav>
<script src="<?= $URL ?>/assets/js/Function.js"></script>
<script>
    DialogHandler('#login-open', 'login-close', 'login-dlg', true);
</script>