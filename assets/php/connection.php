<!-- Using as Package -->
<?php

// Usefull Vars....
$Dir = "project-sem-6";
$URLnoDIR = "http://localhost/";
$URL = "http://localhost/{$Dir}";

$BANKNAME = "WeBank";
$AppName = $BANKNAME;
$Author = "Rayyan Panja";

session_start();
$server = "localhost";
$user = "root";
$psw = "";
$database = "bank";

try {
    $con = mysqli_connect($server, $user, $psw, $database);
    if (!$con) {
        die("Connection Not Established" . mysqli_connect_errno());
    }
} catch (\Throwable $th) {
    header("Location: $URL/Error/error.html");
}

include_once "func.php";
?>

<link rel="stylesheet" href="<?= $URL ?>/assets/css/style.css">
<link rel="stylesheet" href="<?= $URL ?>/assets/css/forms.css">

<!-- JS -->
<script src="<?= $URL ?>/assets/js/Func.js"></script>

<!-- JQuert -->
<script src="<?= $URL ?>/Admin/node_modules/jquery/dist/jquery.js"></script>