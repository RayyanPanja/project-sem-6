<?php
$Path = $URL . "/assets/php/settings";
?>
<nav class="settings-side-nav">
    <div class="settings-profile-wrapper">
        <div class="settings-img-holder">
            <img src="<?= $URL ?>/assets/img/storage/<?= $_SESSION['Img_Path'] ?>" alt="">
        </div>
        <div class="name-holder">
            <h1 title="<?= $_SESSION['Email'] ?>"><?= $name; ?></h1>
            <h3><?= $username; ?></h3>
            <form action="<?= $Path ?>/Update/ImageUpdate/ui.php" method="get">
                <button type="submit" class="form-btn primary-btn">Change Profile Pic</button>
            </form>
        </div>
    </div>
    <div class="settings-link-set">
        <a href="<?= $URL ?>/home.php" class="settings-link">Home</a>
        <a href="<?= $Path ?>/ui.php #Update" class="settings-link">Update Profile</a>
        <a href="<?= $Path ?>/ui.php #Recovery" class="settings-link">Add Recovery Keys</a>
        <a href="<?= $Path ?>/ui.php #LoanProgress" class="settings-link">Track Loan Progress</a>
        <a href="<?= $Path ?>/ui.php #Reply" class="settings-link">Reply to You Message</a>
    </div>
</nav>