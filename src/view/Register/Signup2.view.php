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
    <title>Signup</title>
    <link rel="stylesheet" href="<?= $URL->getCss("Style") ?>">
</head>

<body>

    <?php
    if (Session::Exist("isLoggedin")) {
        include('../component/mainNav.comp.php');
    } else {
        include('../component/indexNav.comp.php');
    }
    ?>

    <main>
        <section class="register-section">
            <div class="register-form-container">
                <form action="<?= $URL->getController("Register2", "Register") ?>" method="post">
                    <div class="form-segment">
                        <h1 class="segment-title">Signup</h1>
                        <div class="row">
                            <div class="set">
                                <label for="">Address</label>
                                <textarea type="text" name="address" id="Address" class="form-input" placeholder="Formate: Address,City-PinCode,State,Country" required></textarea>
                                <p class="imp-msg">Please follow the Following Formate</p>
                            </div>
                        </div>
                        <div class="multi-row">
                            <div class="set">
                                <label for="Email">Email</label>
                                <input type="email" name="email" id="email" class="form-input" placeholder="something@email.com" required>
                            </div>
                            <div class="set">
                                <label for="Contact">Contact</label>
                                <div class="flex">
                                    <select name="tel-country-code" class="tel-select">
                                        <option default value="+91">+91</option>
                                        <option value="+44">+44</option>
                                        <option value="+86">+86</option>
                                        <option value="+1">+1</option>
                                        <option value="+81">+81</option>
                                        <option value="+52">+52</option>
                                    </select>
                                    <input type="tel" name="contact" id="contact" class="form-input" placeholder="00000 00000" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-btn-set bottom-right">
                        <button type="reset" class="form-btn secondary-btn">Cancle</button>
                        <button type="submit" class="form-btn primary-btn">Next</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

</body>
<script>
    const Contact = document.getElementById('contact');
    Contact.addEventListener('input', (e) => {
        if (Contact.value.length == 5) {
            Contact.value += " ";
        }
    });
</script>

</html>