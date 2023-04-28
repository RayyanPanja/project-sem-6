<link rel="stylesheet" href="<?= $URL ?>/assets/css/Navbar.css">

<?php include_once('Login.php'); ?>

<nav class="navbar">
    <div class="link-set" id="set">
        <a href="<?= $URL ?>/index.php" class="link">Home</a>
        <a href="<?= $URL ?>/Help.php" class="link">Help</a>
    </div>
    <div class="auth-set">
        <button class="nav-login-btn" id="login-open">Login</button>
    </div>
</nav>
<button class="toggleNav" id="toggleNav">+</button>
<script src="<?= $URL ?>/assets/js/Navbar.js"></script>