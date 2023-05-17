<?php
require "back_end/Classes/All.class.php";
require "back_end/include/include.php";
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
    Session:
    <?php
    Session::printSession();
    ?>
    <form action="">
        <h1>MANAGE SESSION</h1>
        <select name="option" class="form-input">
            <option value="REFERESH">REFERESH</option>
            <option value="DELETE">DELETE</option>
        </select>
        <button type="submit" class="form-btn primary-btn">DO</button>
    </form>
</body>

</html>
<?php
if (isset($_REQUEST['option'])) {
    $opt = $_REQUEST['option'];
    switch ($opt) {
        case 'REFERESH':
            Session::referesh();
            break;
        case "DELETE":
            Session::destroySession();
            break;
        default:
            # code...
            break;
    }
}
?>