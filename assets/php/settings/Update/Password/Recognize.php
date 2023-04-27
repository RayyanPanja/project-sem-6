<?php
include "../../../connection.php";
include_once('Recog.php');
$acc = $_SESSION['Account_number'];
$name = $_SESSION['Firstname'];
$username = $_SESSION['Username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change PfP-<?= $acc ?></title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <main class="grid-with-side-nav">
        <nav class="settings-side-nav">
            <div class="settings-profile-wrapper">
                <div class="settings-img-holder">
                    <img src="../../../../img/storage/<?= $_SESSION['Img_Path'] ?>" alt="">
                </div>
                <div class="name-holder">
                    <h1 title="<?= $_SESSION['Email'] ?>"><?= $name; ?></h1>
                    <h3><?= $username; ?></h3>
                </div>
            </div>
            <div class="settings-link-set">
                <a href="<?= $URL ?>/home.php" class="settings-link">Home</a>
                <a href="../../ui.php #Update" class="settings-link">Update Profile</a>
                <a href="../../ui.php #LoanProgress" class="settings-link">Track Loan Progress</a>
                <a href="../../ui.php " class="settings-link">Reply to You Message</a>
            </div>
        </nav>

        <section id="Update" class="update-section">
            <div class="banner">
                <h1>Security!! Please Confirm that You Are Owner of this Account</h1>
            </div>
            <div class="settings-form-set">
                <!-- Name -->
                <form action="Recog.php" method="post" enctype="multipart/form-data">
                    <div class="form-segment">
                        <h2 class="segment-title">Change Password ?</h2>
                        <div class="row">
                            <div class="set w-50">
                                <label for="Password">Current Password</label>
                                <input type="password" name="password" id="password" class="form-input" placeholder="**********">
                            </div>
                        </div>
                        <?php
                        if (!is_null($retry) && $retry === boolval(true)) { ?>
                            <a href="AnotherMethod/ui.php" class="outer-link">Try Another Way??</a>
                        <?php }
                        ?>
                        <div class="form-btn-set">
                            <button type="reset" class="form-btn secondary-btn">Clear</button>
                            <button type="submit" class="form-btn primary-btn">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>