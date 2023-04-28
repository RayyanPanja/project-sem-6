<?php
include "../connection.php";

$Account = $_SESSION['Account_number'];
$SirName = $_SESSION['Sirname'];
$Name = $_SESSION['Firstname'];
$FatherName = $_SESSION['Fathername'];
$Image = $_SESSION['Img_Path'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply For Loan?</title>

</head>

<body>
    <!-- Logout Form -->
    <dialog class="login-form" id="logout-dlg">
        <div class="login-img-holder">
            <img src="../../img/storage/<?= $Image; ?>" alt="Login">
        </div>
        <h1>Logout</h1>
        <form action="../auth/logout.php" method="post">
            <h1>Are You Sure You Want to Logout </h1>
            <div class="form-btn-set">
                <button class="form-btn primary-btn" type="submit">Logout</button>
                <button class="form-btn secondary-btn   " type="reset" id="logout-close">Cancle</button>
            </div>
        </form>
    </dialog>
    <!-- Logout Form...ENDS -->

    <!-- NAVBAR -->
    <?php
    include("../../components/MainNavbar.php");
    ?>
    <!-- NAVBAR -->

    <main>
        <div class="signup-form-container">
            <form action="processor/proc1.php" method="post">
                <div class="multi-row">
                    <div class="set">
                        <div class="set">
                            <label for="ACC">Account Number</label>
                        </div>
                        <div class="set">
                            <input type="number" name="account" id="accno" class="input" placeholder="000000" required>
                        </div>
                    </div>
                    <div class="set">
                        <div class="set">
                            <label for="Password">Password</label>
                        </div>
                        <div class="set">
                            <input type="password" name="password" id="psw" class="input" placeholder="******" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="set">
                        <label for="Email">Email</label>
                    </div>
                    <div class="set">
                        <input type="email" name="email" id="email" class="input" placeholder="example@mail.com" required>
                    </div>
                </div>
                <div class="row">
                    <div class="set">
                        <label for="Contact">Contact</label>
                    </div>
                    <div class="set">
                        <input type="tel" name="contact" id="contact" class="input" placeholder="0000000000" required>
                    </div>
                </div>
                <div class="form-btn-set">
                    <button type="submit" class="form-btn primary-btn">Next</button>
                    <button type="reset" id="cancle" class="form-btn secondary-btn">Cancle</button>
                </div>
            </form>
        </div>

    </main>

</body>

<script>
    DialogHandler('logout-open', 'logout-close', 'logout-dlg', true);
    const CancleBtn = document.querySelector('#cancle');
    CancleBtn.addEventListener('click', () => {
        window.location.assign('../../../home.php');
    });
</script>

</html>