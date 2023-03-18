<?php
include "assets/php/connection.php";
$ID = $_SESSION['AdminID'];
$NAME = $_SESSION['AdminName'];
$DESIG = $_SESSION['AdminDesig'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $NAME; ?> ADMIN</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/Style.css">
</head>

<body id="home">
    <dialog class="login-form dark-form" id="logout-form">
        <div class="form-title">Logout</div>
        <h1 class="huge-text">Are You Sure You Want to Logout.</h1>
        <form action="assets/php/Auth/logout.php" method="post">
            <div class="form-btn-set">
                <button type="reset" id="logout-close" class="form-btn secondary-btn">Cancle</button>
                <button type="submit" class="form-btn primary-btn">Logout</button>
            </div>
        </form>
    </dialog>

    <nav class="navbar">
        <div class="link-set">
            <a href="#home" class="link">Home</a>
            <a href="assets/php/Deposit/ui.php" class="link">Deposit Amount</a>
            <a href="assets/php/Loan/ui.php" class="link">Loan Applications</a>
            <a href="assets/php/Users/ui.php" class="link">User Details</a>
            <a href="help.html" class="link">Help</a>
        </div>
    </nav>
    <header class="hero">
        <h1 class="hero-title"><?php echo $NAME; ?></h1>
        <h1 class="hero-title">(<?php echo $DESIG; ?>)</h1>
        <button id="logout-opener" class="big-hero-btn">Logout</button>
        <div class="msg-card">
            <div class="msg-title">Task Viewer</div>
            <table>
                <tr>
                    <th>New Loan Requests :</th>
                    <td>
                        <code>
                            <?php echo NumOfRows($con, 'loan', 'Decision', 'pending'); ?>
                        </code>
                    </td>
                </tr>
                <tr>
                    <th>Accounts :</th>
                    <td>
                        <code>
                            <?php echo NumOfRows($con, 'main'); ?>
                        </code>
                    </td>
                </tr>

                <tr>
                    <th>New Messages :</th>
                    <td>
                        <code>
                            <?php echo NumOfRows($con, 'comment', 'Status', "unread"); ?>
                        </code>
                    </td>
                </tr>

                <tr>
                    <th>Deleted Accounts :</th>
                    <td>
                        <code>
                            <?php echo NumOfRows($con, 'deletedaccounts'); ?>
                        </code>
                    </td>
                </tr>
            </table>
            </p>
        </div>
    </header>

</body>
<script src="assets/js/Function.js"></script>
<script>
    DialogHandler('logout-opener', 'logout-close', 'logout-form', true);
</script>

</html>
<?php
unset($_SESSION['ErrorAccount'], $_SESSION['ErrorPassword']);
?>