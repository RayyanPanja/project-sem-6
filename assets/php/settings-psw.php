<?php include_once('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Portal</title>
</head>

<body>

    <div class="center-div">

        <div class="pin-form">
            <form action="settings-middleware.php" method="post">
                <h1 class="center">Security Wall</h1>
                <div class="row">
                    <div class="set">
                        <label for="Pin">Pin</label>
                    </div>
                    <div class="set">
                        <input type="password" name="pin" id="pin" class="input" placeholder="Pin" required>
                    </div>
                </div>
                <div class="form-btn-set">
                    <button class="form-btn primary-btn" type="submit">Access</button>
                    <button class="form-btn secondary-btn   " type="reset">Cancle</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>