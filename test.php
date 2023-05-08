<?php
require "back_end/Classes/All.class.php";
require "back_end/include/include.php";
require "back_end/Logic/SignupLogic.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="img">
        <button type="submit">AS</button>
    </form>
    Session:
    <?php
    Session::printSession();
    ?>

    TEST::
    <?php
    if (isset($_FILES['img'])) {
        echo uploadProfileImage("img","test_storage");
    }
    ?>

</body>

</html>