<?php
include "../connection.php";
session_start();
$Account = $_SESSION['Account'];
$SirName = $_SESSION['Sirname'];
$Name = $_SESSION['Name'];
$FatherName = $_SESSION['Father'];
$Image = $_SESSION['image'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <!-- Logout Form -->
    <dialog class="login-form" id="logout-dlg">
        <div class="login-img-holder">
            <img src="../../img/storage/<?php echo $Image; ?>" alt="Login">
        </div>
        <h1>Logout</h1>
        <form action="../auth/logout.php" method="post">
            <h1>Are You Sure You Want to Logout </h1>
            <div class="login-btn-set">
                <button class="login-btn cool-btn" type="submit">Logout</button>
                <button class="cancle-btn cool-btn" type="reset" id="logout-close">Cancle</button>
            </div>
        </form>
    </dialog>
    <!-- Logout Form...ENDS -->
    <nav class="navbar">
        <div class="logo">
            <h1>^w^</h1>
        </div>
        <div class="link-set">
            <a href="../../../home.php" class="link">Home</a>
            <a href="../dashboard/dashboard.php" class="link">DashBoard</a>
            <a href="../transfer/ui.php" class="link">Transfer</a>
            <a href="ui.php" class="link">Loan</a>
            <a href="../balance/ui.php" class="link">Balance</a>
            <a href="../contact/ui.php" class="link">Contact</a>
            <button type="submit" class="logout-btn" id="logout-open">Logout</button>
        </div>
        <div class="auth">
            <div class="user-detail-box">
                <div class="user-img-holder">
                    <img src="<?php echo "../../img/storage/" . $Image; ?>" alt="<?php echo $SirName . $Name . $FatherName; ?>">
                </div>
                <div class="">
                    <h1 class="user-name" title="<?php echo $SirName . " " . $Name . " " . $FatherName; ?>">
                        <?php
                        echo $Name;
                        ?>
                    </h1>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="signup-form-container">
            <form action="processor/proc1.php" method="post">
                <div class="dual-row">
                    <div class="set">
                        <div class="col-lab">
                            <label for="ACC">Account Number</label>
                        </div>
                        <div class="col-inp-short">
                            <input type="number" name="account" id="accno" class="input" placeholder="000000" required>
                        </div>
                    </div>
                    <div class="set">
                        <div class="col-lab">
                            <label for="Password">Password</label>
                        </div>
                        <div class="col-inp-short">
                            <input type="password" name="password" id="psw" class="input" placeholder="******" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lab">
                        <label for="Email">Email</label>
                    </div>
                    <div class="col-inp">
                        <input type="email" name="email" id="email" class="input" placeholder="example@mail.com" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lab">
                        <label for="Contact">Contact</label>
                    </div>
                    <div class="col-inp">
                        <input type="tel" name="contact" id="contact" class="input" placeholder="0000000000" required>
                    </div>
                </div>
                <div class="register-btn-set">
                    <button type="submit" class="submit btn">Next</button>
                    <button type="reset" id="cancle" class="cancle btn">Cancle</button>
                </div>
            </form>
        </div>

    </main>

</body>
<script src="../../js/Dialog.js"></script>
<script>
    DialogHandler('logout-open', 'logout-close', 'logout-dlg', true);
    const CancleBtn = document.querySelector('#cancle');
    CancleBtn.addEventListener('click', () => {
        window.location.assign('../../../home.php');
    });
</script>

</html>