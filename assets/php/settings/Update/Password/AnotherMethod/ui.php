<?php
include "../../../../connection.php";
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
    <title>Change Password-<?= $acc ?></title>
    <link rel="stylesheet" href="../../../css/style.css">
</head>

<body>
    <main class="grid-with-side-nav">

        <!-- Side Nav -->
        <?php include('../../../component/sidenav.php'); ?>
        <!-- Side Nav -->

        <section id="Update" class="update-section">
            <div class="banner">
                <h1>Please Add Your Recovery Phase</h1>
            </div>
            <div class="settings-form-set">
                <!-- Name -->
                <form action="match.php" method="post" enctype="multipart/form-data">
                    <div class="alert-msg">
                        <p>* Once Set can be Updated!</p>
                    </div>
                    <div class="form-segment">
                        <h2 class="segment-title">Numeric Key</h2>
                        <div class="row">
                            <div class="set">
                                <label for="Number">Numeric Key</label>
                                <input type="number" name="numkey" id="numkey" class="form-input" placeholder="???">
                            </div>
                        </div>
                        <h1 class="txt-center">OR</h1>
                        <h2 class="segment-title">Alphabetic Key</h2>
                        <div class="row">
                            <div class="set">
                                <label for="Word">Alphabetic Word</label>
                                <input type="text" name="wordkey" id="wordkey" class="form-input" placeholder="?????">
                            </div>
                        </div>
                        <div class="form-btn-set">
                            <button type="reset" class="form-btn form-btn secondary-btn ">Clear</button>
                            <button type="submit" class="form-btn primary-btn">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>