<?php
if ($_SESSION["Loggedin"] == boolval(true)) { ?>
    <nav class="navbar">
        <div class="logo">
            <h1>^w^</h1>
        </div>
        <div class="link-set">
            <a href="<?= $URL; ?>/assets/php/dashboard/dashboard.php" class="link">DashBoard</a>
            <a href="<?= $URL; ?>/assets/php/transfer/ui.php" class="link">Transfer</a>
            <a href="<?= $URL; ?>/assets/php/loan/ui.php" class="link">Loan</a>
            <a href="<?= $URL; ?>/assets/php/balance/ui.php" class="link">Balance</a>
            <a href="<?= $URL; ?>/assets/php/contact/ui.php" class="link">Contact</a>
            <button type="submit" class="logout-btn" id="logout-open">Logout</button>
        </div>
        <div class="auth">
            <div class="user-detail-box">
                <div class="user-img-holder">
                    <img src="<?= $URL."/assets/img/storage/". $Image; ?>" alt="<?php echo $SirName . $Name . $FatherName; ?>">
                </div>
                <div class="">
                    <h1 class="user-name" title="<?php echo $SirName . " " . $Name . " " . $FatherName; ?>">
                        <?php
                        echo $Name;
                        ?>
                    </h1>
                </div>
            </div>
        </div>
    </nav>
<?php } else { ?>
    <nav class="navbar">
        <div class="logo">
            <h1>^w^</h1>
        </div>
        <div class="link-set">
            <a href="<?= $URL; ?>/index.php" class="link">Home</a>
            <a href="<?= $URL; ?>/index.php #about" class="link">About</a>
            <a href="<?= $URL; ?>/assets/php/contact/ui.php" class="link">Contact</a>

        </div>
        <div class="auth">
            <button id="login-open" class="auth-btn login">Login</button>
            <hr>
            <button id="register-btn" class="auth-btn signup">Register</button>
        </div>
    </nav>
<?php } ?>