<?php
include "../connection.php";
 
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
        <h1 align="center">Fill Up Details</h1>
        <form action="processor/step3.php" method="post" enctype="multipart/form-data">
            <div class="dual-row">
                <div class="set">
                    <div class="col-lab">
                        <label for="Email">Email</label>
                    </div>
                    <div class="col-inp-short">
                        <input type="email" name="email" id="email" class="input" placeholder="e.g. some@mail.com" required>
                    </div>
                </div>
                <div class="set">
                    <div class="col-lab">
                        <label for="contact">Contact</label>
                    </div>
                    <div class="col-inp-short">
                        <input type="number" name="contact" id="contact" class="input" placeholder="+00 0000000000" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lab">
                    <label for="image">Upload Img</label>
                </div>
                <div class="col-inp">
                    <input type="file" name="image" id="img" class="input ">
                </div>
            </div>

            <div class="register-btn-set">
                <button type="submit" class="submit btn">Next</button>
                <button type="reset" class="cancle btn">Cancle</button>
            </div>
        </form>
    </div>
</body>

</html>