<link rel="stylesheet" href="<?= $URL ?>/assets/css/FormCompo.css">

<!-- Login Form -->
<dialog class="login-form" id="login-dlg">
    <h1>Login</h1>
    <form action="<?= $URL ?>/assets/php/Auth/login.php" method="post">
        <div class="row">
            <div class="col">
                <label for="Admin ID">Admin ID</label>
            </div>
            <div class="col">
                <input type="number" name="adminid" class="form-input" placeholder="Admin ID" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="Password">Password</label>
            </div>
            <div class="col">
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
<!-- Login Form...ENDS -->
<script src="<?= $URL ?>/assets/js/Function.js"></script>
<script>
    DialogHandler('#login-open', 'login-close', 'login-dlg', true);
</script>