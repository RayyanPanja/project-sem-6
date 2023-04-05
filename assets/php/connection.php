<!-- Using as Package -->
<?php
include "func.php";

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
?>

<link rel="stylesheet" href="<?= $URL?>/assets/css/style.css">
<link rel="stylesheet" href="<?= $URL?>/assets/css/forms.css">
<script src="https://kit.fontawesome.com/5ac4d734e2.js" crossorigin="anonymous"></script>