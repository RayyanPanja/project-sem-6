<?php
require "../../../back_end/Classes/All.class.php";
require "../../../back_end/include/include.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="<?= $URL->getCss("Style") ?>">
</head>

<body>

    <?php
    if (Session::Exists("isLoggedin")) {
        include('../component/mainNav.comp.php');
    } else {
        include('../component/indexNav.comp.php');
    }
    ?>

    <main>
        <section class="register-section">
            <div class="register-form-container">
                <form action="<?= $URL->getController("Register3", "Register") ?>" method="post" enctype="multipart/form-data">
                    <div class="form-segment">
                        <h1 class="segment-title">Signup</h1>
                        <div class="row">
                            <div class="set">
                                <label for="Username">Username</label>
                                <input type="text" name="username" id="username" class="form-input" placeholder="Something Like : YourName@123..." required>
                            </div>
                        </div>
                        <div class="multi-row">
                            <div class="set">
                                <label for="Password">Password</label>
                                <input type="password" name="password" id="password" class="form-input" placeholder="******" min="6" required>
                            </div>
                            <div class="set">
                                <label for="ConfirmPassword">Confirm Password</label>
                                <input type="password" name="confirmpassword" id="confirmpassword" class="form-input" placeholder="******" min="6" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="set">
                                <label for="Image">Profile Image</label>
                                <input type="file" name="pfp" class="form-input block">
                            </div>
                        </div>
                    </div>
                    <div class="form-btn-set bottom-right">
                        <button type="reset" class="form-btn secondary-btn">Cancle</button>
                        <button type="submit" class="form-btn primary-btn">Next</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

</body>

</html>