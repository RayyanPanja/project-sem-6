<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loggin out</title>
</head>

<body>
    <?php
    include "../connection.php";
    function Logout()
    {
        session_start();
        $_SESSION["Account"];
        $_SESSION['Name'];
        $_SESSION['Password'];
        session_destroy();
        header("Location: ../../../index.php");
    }
    Logout();
    ?>
    <div class="loader-wrapper">
        <h1>Logging Out</h1>
    </div>
</body>

</html>