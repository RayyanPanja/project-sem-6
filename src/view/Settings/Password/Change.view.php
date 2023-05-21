<?php
require "../../../../back_end/Classes/All.class.php";
require "../../../../back_end/include/include.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <?= Route::getCSS("Style") ?>
    <?= Route::getCSS("Dashboard") ?>
    <?= Route::getCSS("Settings") ?>
</head>

<body>
    <main class="balance-section">
        <div class="contact-form-container">
            <form action="<?= Route::getController("Change", "Settings/Update/Password") ?>" method="post">
                <div class="form-segment">
                    <h1 class="segment-title">Change Password</h1>
                    <div class="row">
                        <div class="set">
                            <label for="password">New Password</label>
                            <input type="password" name="password" id="password" class="form-input" placeholder="*******" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="set">
                            <label for="confirmpassword">Confirm New Password</label>
                            <input type="password" name="confirmpassword" id="confirmpassword" class="form-input" placeholder="*******" required>
                        </div>
                    </div>
                    <div class="form-btn-set">
                        <button type="reset" class="form-btn secondary-btn">Cancle</button>
                        <button type="submit" class="form-btn primary-btn">Change</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>