<?php
include_once "../connection.php";

$_SESSION['TempAcc'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>

</head>

<body>
    <h1 align="center">Sign Up</h1>
    <div class="signup-form-container">
        <h1 align="center">Set Password</h1>
        <form action="processor/setpsw.php" method="post">
            <div class="row">
                <div class="set">
                    <label for="psw">Password</label>
                    <input type="password" name="password1" id="psw1" class="input " placeholder="******" maxlength="6" required>
                </div>
            </div>

            <div class="row">
                <div class="set">
                    <label for="psw2">Repeat Password</label>
                    <input type="password" name="password2" id="psw2" class="input " placeholder="******" maxlength="6" required>
                </div>
            </div>
            <div class="form-btn-set">
                <button type="submit" class="form-btn primary-btn">Create</button>
                <button type="reset" class="form-btn secondary-btn">Cancle</button>
            </div>
        </form>
    </div>
</body>

</html>