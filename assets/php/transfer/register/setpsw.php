<?php
include "../connection.php";
session_start();
$_SESSION['TempAcc'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <h1 align="center">Sign Up</h1>
    <div class="signup-form-container">
        <h1 align="center">Set Password</h1>
        <form action="processor/setpsw.php" method="post">
            <div class="row">
                <div class="col-lab">
                    <label for="psw">Password</label>
                </div>
                <div class="col-inp">
                    <input type="password" name="password1" id="psw1" class="input " placeholder="******" maxlength="6" required>
                </div>
            </div>

            <div class="row">
                <div class="col-lab">
                    <label for="psw2">Repeat Password</label>
                </div>
                <div class="col-inp">
                    <input type="password" name="password2" id="psw2" class="input " placeholder="******" maxlength="6" required>
                </div>
            </div> 
            <div class="register-btn-set">
                <button type="submit" class="submit btn">Create</button>
                <button type="reset" class="cancle btn">Cancle</button>
            </div>
        </form>
    </div>
</body>

</html>