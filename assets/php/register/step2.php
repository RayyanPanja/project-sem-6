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

</head>

<body>
    <h1 align="center">Sign Up</h1>
    <div class="signup-form-container">
        <h1 align="center">Fill Up Details</h1>
        <form action="processor/step2.php" method="get">

            <div class="row">
                <div class="set">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="add" class="input" placeholder="your full address" required>
                </div>
            </div>

            <div class="multi-row">
                <div class="set">
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" class="input" placeholder="e.g. Veraval" required>
                </div>
                <div class="set">
                    <label for="pincode">Pin Code</label>
                    <input type="number" name="pincode" id="pin" class="input" placeholder="e.g. 362265" maxlength="6" required>
                </div>
            </div>

            <div class="multi-row">
                <div class="set">
                    <label for="state">State</label>
                    <input type="text" name="state" id="state" class="input" placeholder="e.g. Gujarat" required>
                </div>
                <div class="set">
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country" class="input" placeholder="e.g. India" required>
                </div>
            </div>
            <div class="form-btn-set">
                <button type="submit" class="form-btn primary-btn">Next</button>
                <button type="reset" class="form-btn secondary-btn">Cancle</button>
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