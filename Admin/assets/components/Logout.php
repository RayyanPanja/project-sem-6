<link rel="stylesheet" href="<?= $URL ?>/assets/css/FormCompo.css">

<!-- Login Form -->
<dialog class="login-form" id="login-dlg">
    <h1>Logout</h1>
    <h2 class="alert-text">Are You Sure!!</h2>
    <form action="<?= $URL ?>/assets/php/Auth/logout.php" method="post">
        <div class="form-btn-set">
            <button class="form-btn primary-btn" type="submit">Logout</button>
            <button class="form-btn secondary-btn   " type="reset" id="login-close">Cancle</button>
        </div>
    </form>
</dialog>
<!-- Login Form...ENDS -->
<script src="<?= $URL ?>/assets/js/Function.js"></script>
<script>
    DialogHandler('#login-open', 'login-close', 'login-dlg', true);
</script>