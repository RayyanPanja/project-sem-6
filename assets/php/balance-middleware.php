<?php

include_once "connection.php";

if (isset($_REQUEST['pin'])) {
    if ($_REQUEST['pin'] === $_SESSION['Password']) {
        header("Location: balance/ui.php");
    } else { ?>
    <script>
        alert("Pin Incorrent") 
        location.assign('pin.php');
    </script>

    <?php }
}

    ?>