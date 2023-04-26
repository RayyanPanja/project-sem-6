<?php include('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Portal</title>
</head>

<body>

    <div class="login-form">
        <form action="settings-middleware.php" method="post">
            <h1 class="center">Security Wall</h1>
            <div class="row">
                <div class="col-lab">
                    <label for="Pin">Pin</label>
                </div>
                <div class="col-inp">
                    <input type="password" name="pin" id="pin" class="login-input" placeholder="Pin" required>
                </div>
            </div>
            <div class="login-btn-set">
                <button class="login-btn cool-btn" type="submit">Access</button>
                <button class="cancle-btn cool-btn" type="reset">Cancle</button>
            </div>
        </form>
    </div>

</body>

</html>