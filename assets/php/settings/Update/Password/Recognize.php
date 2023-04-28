<?php
include_once "../../../connection.php";
include_once('Recog.php');

$acc = $_SESSION['Account_number'];
$name = $_SESSION['Firstname'];
$username = $_SESSION['Username'];
// $_SESSION['temp_bool'];

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
        <!-- Side Nav -->
        <?php include_once('../../component/sidenav.php'); ?>
        <!-- Side Nav -->

        <section id="Update" class="update-section">
            <div class="banner">
                <h1>Security!! Please Confirm that You Are Owner of this Account</h1>
            </div>
            <div class="settings-form-set">
                <!-- Name -->
                <form action="Recog.php" method="post" enctype="multipart/form-data">
                    <div class="form-segment">
                        <h2 class="segment-title">Change Password ?</h2>
                        <div class="settings-row">
                            <div class="set w-50">
                                <label for="Password">Current Password</label>
                                <input type="password" name="password" id="password" class="form-input" placeholder="**********">
                            </div>
                        </div>
                        <?php
                        if (isset($_SESSION['temp_bool'])) {
                            if ($_SESSION['temp_bool'] === boolval(true)) { ?>
                                <a href="AnotherMethod/ui.php" class="outer-link">Try Another Way??</a>
                        <?php }
                        }
                        ?>
                        <div class="settings-form-btn-set">
                            <button type="reset" class="settings-form-btn settings-secondary-btn ">Clear</button>
                            <button type="submit" class="settings-form-btn settings-primary-btn">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>
<?php
unset($_SESSION['temp_bool']);
?>