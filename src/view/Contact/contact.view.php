<?php
require "../../../back_end/Classes/All.class.php";
require "../../../back_end/include/include.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link rel="stylesheet" href="<?= $URL->getCss("Style") ?>">
</head>

<body>

    <?php
    if (Session::Exist("isLoggedin")) {
        include("../component/mainNav.comp.php");
    } else {
        include("../component/IndexNav.comp.php");
    }
    ?>
    <main>
        <section class="contact-section">
            <div class="contact-form-container">
                <form action="<?= $URL->getController("Contact", "contact") ?>" method="post">
                    <div class="form-segment">
                        <h1 class="segment-title">Write us a Review</h1>
                        <div class="row">
                            <div class="set">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-input" placeholder="YourEmail@mail.com">
                            </div>
                        </div>
                        <div class="row">
                            <div class="set">
                                <label for="subject">Subject</label>
                                <select name="subject" id="subject" class="form-input">
                                    <option value="Review">Review</option>
                                    <option value="Question">Question</option>
                                    <option value="Issues">Issues</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="set">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="3" class="form-input" placeholder="Hello , I Am......."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-btn-set">
                        <button type="reset" class="form-btn secondary-btn">Clear</button>
                        <button type="submit" class="form-btn primary-btn">Submit</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

</body>

</html>