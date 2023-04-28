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
        <h1 align="center">Fill Up Details</h1>
        <form action="processor/step3.php" method="post" enctype="multipart/form-data">
            <div class="multi-row">
                <div class="set">
                    <label for="Email">Email</label>
                    <input type="email" name="email" id="email" class="input" placeholder="e.g. some@mail.com" required>
                </div>
                <div class="set">
                    <label for="contact">Contact</label>
                    <input type="number" name="contact" id="contact" class="input" placeholder="+00 0000000000" required>
                </div>
            </div>

            <div class="row">
                <div class="set">
                    <label for="image">Upload Img</label>
                    <input type="file" name="image" id="img" class="input ">
                </div>
            </div>
            
            <div class="form-btn-set">
                <button type="submit" class="form-btn primary-btn">Next</button>
                <button type="reset" class="form-btn secondary-btn">Cancle</button>
            </div>
        </form>
    </div>
</body>

</html>