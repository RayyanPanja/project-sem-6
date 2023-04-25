<!-- Using as Package -->
<?php
include "func.php";

// Usefull Vars....
$Dir = "Admin";
$URLnoDIR = "http://localhost/project-sem-6";
$URL = "http://localhost/project-sem-6/{$Dir}";

$BANKNAME = "WeBank";
$AppName = $BANKNAME . " Admin";
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
    header("Location: $URLnoDIR/Error/error.html");
}
?>
<!-- Css -->
<link rel="stylesheet" href="<?= $URL; ?>/assets/css/Style.css">
<!-- Jquery -->
<script src="<?= $URL ?>/node_modules/jquery/dist/jquery.js"></script>
<script src="<?= $URL ?>/node_modules/jquery/dist/jquery.min.js"></script>