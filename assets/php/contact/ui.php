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
            <h1 align="center">Hello</h1>
            <form action="processor/send.php" method="post">
                <div class="dual-row">
                    <div class="set">
                        <div class="col-lab">
                            <label for="Email">Email</label>
                        </div>
                        <div class="col-inp">
                            <input type="email" name="email" id="email" class="input" placeholder="e.g. yourEmail@mail.com">
                        </div>
                    </div>
                    <div class="set">
                        <div class="col-lab">
                            <label for="Subject">Subject</label>
                        </div>
                        <div class="col-inp">
                            <input type="text" name="subject" id="subject" class="input" placeholder="Question OR Improvement">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="set">
                        <div class="col-lab">
                            <label for="Message">Review</label>
                        </div>
                        <textarea name="message" id="message" cols="50" rows="5" class="input" placeholder="Hello ,">Hello,</textarea>
                    </div>
                </div>
                <div class="register-btn-set">
                    <button type="submit" class="submit btn">Send</button>
                    <button type="reset" class="cancle btn">Cancle</button>
                </div>
            </form>
        </div>


    </main>

</body>
<script src="../../js/Func.js"></script>
</html>