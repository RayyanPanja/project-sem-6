<?php
include_once "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

</head>

<body>

    <?php
    if ($_SESSION['Loggedin'] == true) { ?>
        <?php include_once('../../components/MainNavbar.php'); ?>
    <?php }
    ?>
    <main>
        <?php
        if ($_SESSION['Loggedin'] == false) { ?>
            <button class="cool-big-btn" onclick="goToHome()" id="Home">Go Back</button>
        <?php }
        ?>

        <div class="signup-form-container">
            <h1 align="center">Hello</h1>
            <form action="processor/send.php" method="post">
                <div class="multi-row">
                    <div class="set">
                        <div class="set">
                            <label for="Email">Email</label>
                        </div>
                        <div class="set">
                            <input type="email" name="email" id="email" class="input" placeholder="e.g. yourEmail@mail.com">
                        </div>
                    </div>
                    <div class="set">
                        <div class="set">
                            <label for="Subject">Subject</label>
                        </div>
                        <div class="set">
                            <input type="text" name="subject" id="subject" class="input" placeholder="Question OR Improvement">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="set">
                        <div class="set">
                            <label for="Message">Review</label>
                        </div>
                        <textarea name="message" id="message" cols="50" rows="5" class="input" placeholder="Hello ,">Hello,i am <?= ($_SESSION['Loggedin']) ? $_SESSION['Firstname'] : "" ?></textarea>
                    </div>
                </div>
                <?php
                if ($_SESSION['Loggedin'] == true) { ?>
                    <input type="hidden" name="acc" value="<?= $_SESSION['Account_number'] ?>">
                <?php }
                ?>
                <div class="form-btn-set">
                    <button type="submit" class="form-btn primary-btn">Send</button>
                    <button type="reset" class="form-btn secondary-btn">Cancle</button>
                </div>
            </form>
        </div>


    </main>

</body>


</html>