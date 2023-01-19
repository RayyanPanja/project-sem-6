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
        <h1 align="center">Fill Up Details</h1>
        <form action="processor/step2.php" method="get">

            <div class="row">
                <div class="col-lab">
                    <label for="address">Address</label>
                </div>
                <div class="col-inp">
                    <input type="text" name="address" id="add" class="input" placeholder="your full address">
                </div>
            </div>

            <div class="dual-row">
                <div class="set">
                    <div class="col-lab">
                        <label for="city">City</label>
                    </div>
                    <div class="col-inp-short">
                        <input type="text" name="city" id="city" class="input" placeholder="e.g. Veraval">
                    </div>
                </div>
                <div class="set">
                    <div class="col-lab">
                        <label for="pincode">Pin Code</label>
                    </div>
                    <div class="col-inp-short">
                        <input type="number" name="pincode" id="pin" class="input" placeholder="e.g. 362265" maxlength="6">
                    </div>
                </div>
            </div>

            <div class="dual-row">
                <div class="set">
                    <div class="col-lab">
                        <label for="state">State</label>
                    </div>
                    <div class="col-inp-short">
                        <input type="text" name="state" id="state" class="input" placeholder="e.g. Gujarat">
                    </div>
                </div>
                <div class="set">
                    <div class="col-lab">
                        <label for="country">Country</label>
                    </div>
                    <div class="col-inp-short">
                        <input type="text" name="country" id="country" class="input" placeholder="e.g. India">
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
<script>
    // Get the input element
    var input = document.getElementById("pin");

    // Set the maximum length of the input
    input.maxLength = 6;

    // Add an event listener for the keypress event
    input.addEventListener("keypress", function(event) {
        // Check if the input length is greater than the maximum length
        if (input.value.length >= input.maxLength) {
            // Prevent the keypress event
            event.preventDefault();
        }
    });
</script>

</html>