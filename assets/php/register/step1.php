<?php
include "../connection.php";
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
        <form action="processor/step1.php" method="get">
            <div class="dual-row">
                <div class="set">
                    <div class="col-lab">
                        <label for="SirName">SirName</label>
                    </div>
                    <div class="col-inp-short">
                        <input type="text" name="sirname" id="sname" class="input" placeholder="SirName" required>
                    </div>
                </div>
                <div class="set">
                    <div class="col-lab">
                        <label for="YourName">Your Name</label>
                    </div>
                    <div class="col-inp-short">
                        <input type="text" name="yourname" id="uname" class="input" placeholder="your Name" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lab">
                    <label for="Father Name">Father Name</label>
                </div>
                <div class="col-inp">
                    <input type="text" name="fathername" id="fname" class="input" placeholder="Father Name" required>
                </div>
            </div>

            <div class="dual-row">
                <div class="set">
                    <div class="col-lab">
                        <label for="DOB">Date Of Birth</label>
                    </div>
                    <div class="col-inp-short">
                        <input type="date" name="dob" id="dname" class="input" required>
                    </div>
                </div>
                <div class="set">
                    <div class="col-lab">
                        <label for="gender">Gender</label>
                    </div>
                    <div class="col-inp-short">
                        <select name="gender" id="gender" class="input" required>
                            <option value="Male" class="input-option">Male</option>
                            <option value="Female" class="input-option">Female</option>
                        </select>
                    </div>
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