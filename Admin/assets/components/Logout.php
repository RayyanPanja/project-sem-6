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
<script src="<?= $URL ?>/assets/js/Function.js"></script>
<script>
    DialogHandler('#login-open', 'login-close', 'login-dlg', true);
</script>