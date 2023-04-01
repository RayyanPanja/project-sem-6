<?php
include "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

    <?php
    if ($LOGGEDIN === true) { ?>
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
                <a href="ui.php" class="link">Contact</a>
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
    <?php
    }
    ?>

    <main>
        <?php
        if ($LOGGEDIN === false) { ?>
            <button class="cool-big-btn" onclick="goToHome()" id="Home">Go Back</button>
        <?php
        }
        ?>

        <div class="signup-form-container">
            <h1 align="center">Your Message has Been Delivered, Soon We Will Give you Respone</h1>
            <h1 align="center">Thanks you</h1>
        </div>


    </main>

</body>
<script src="../../js/Func.js"></script>
</html>