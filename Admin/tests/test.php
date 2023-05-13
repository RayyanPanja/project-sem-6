<?php
require "../app/Classes/autoload.php";
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
    SessioN:
    <?php
    Session::print_Session();
    ?>
    TABLE:
    <?php
    $table = new Table("admin", "Admin_ID");
    $res = $table->select()->get_Table();
    Helper::pa($res)
    ?>

</body>

</html>