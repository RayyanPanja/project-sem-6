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

</head>

<body>

    <?php
    if ($_SESSION['Loggedin'] == true) { ?>
        <?php include('../../components/MainNavbar.php'); ?>
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