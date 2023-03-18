<?php
include "assets/php/connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/Style.css">
</head>

<body>
    <dialog class="login-form dark-form" id="login-form" <?php if (!empty($_SESSION['ErrorAccount'])  || !empty($_SESSION['ErrorPassword'])) {
                                                                echo "open";
                                                            } ?>>
        <div class="form-title">Login</div>
        <form action="assets/php/Auth/login.php" method="post">
            <div class="row">
                <div class="col">
                    <label for="Admin ID">Admin ID</label>
                    <input type="number" name="adminid" class="form-input" placeholder="000">
                    <?php
                    if (isset($_SESSION['ErrorAccount'])) {
                    ?>
                        <div class="error-msg"> <?php echo $_SESSION['ErrorAccount'] ?> </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="col">
                    <label for="pasw">Password</label>
                    <input type="password" name="password" id="psw" class="form-input" placeholder="*****">
                    <?php
                    if (isset($_SESSION['ErrorPassword'])) {
                    ?>
                        <div class="error-msg"> <?php echo $_SESSION['ErrorPassword'] ?> </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="form-btn-set">
                <button type="reset" id="login-close" class="form-btn secondary-btn">Cancle</button>
                <button type="submit" class="form-btn primary-btn">Login</button>
            </div>
        </form>
    </dialog>

    <nav class="navbar">
        <div class="link-set">
            <a href="#home" class="link">Home</a>
            <a href="#help" class="link">Help</a>
        </div>
    </nav>
    <header class="hero">
        <h1 class="hero-title"><?php echo $BANKNAME; ?> Admin Panel</h1>
        <button id="login-opener" class="big-hero-btn">Login</button>
    </header>

</body>
<script src="assets/js/Function.js"></script>
<script>
    DialogHandler('login-opener', 'login-close', 'login-form', true);
</script>

</html>
<?php
unset($_SESSION['ErrorAccount'], $_SESSION['ErrorPassword']);
?>