<?php
include_once "../connection.php";
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
        <form action="processor/step1.php" method="get">
            <div class="multi-row">
                <div class="set">
                    <label for="SirName">SirName</label>
                    <input type="text" name="sirname" id="sname" class="input" placeholder="SirName" required>
                </div>
                <div class="set">
                    <label for="YourName">Your Name</label>
                    <input type="text" name="yourname" id="uname" class="input" placeholder="your Name" required>
                </div>
            </div>
            <div class="row">
                <div class="set">
                    <label for="Father Name">Father Name</label>
                    <input type="text" name="fathername" id="fname" class="input" placeholder="Father Name" required>
                </div>
            </div>
            <div class="multi-row">
                <div class="set">
                    <label for="DOB">Date Of Birth</label>
                    <input type="date" name="dob" id="dname" class="input" required>
                </div>
                <div class="set">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="input" required>
                        <option value="Male" class="input-option">Male</option>
                        <option value="Female" class="input-option">Female</option>
                    </select>
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