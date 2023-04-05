<?php
include "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit Amount</title>
    <!-- ICONS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.css' integrity='sha512-+ouAqATs1y4kpPMCHfKHVJwf308zo+tC9dlEYK9rKe7kiP35NiP+Oi35rCFnc16zdvk9aBkDUtEO3tIPl0xN5w==' crossorigin='anonymous' />
    <!-- CSS -->

</head>

<body>
    <script src="../../js/Function.js"></script>
    <nav class="navbar">
        <div class="link-set">
            <a href="../../../home.php" class="link">Home</a>
            <a href="../Deposit/ui.php" class="link">Deposit Amount</a>
            <a href="ui.php" class="link">Loan Applications</a>
            <a href="../Users/ui.php" class="link">User Details</a>
            <a href="help.html" class="link">Help</a>
        </div>
    </nav>
    <main>
        <h1 class="page-title">Loan Applications</h1>
        <table border="2px">
            <tr>
                <th>Application ID</th>
                <th>Account Number</th>
                <th>Amount</th>
                <th>Package</th>
                <th>CIBIL</th>
            </tr>
            <?php
            

            ?>
        </table>
    </main>
</body>

</html>