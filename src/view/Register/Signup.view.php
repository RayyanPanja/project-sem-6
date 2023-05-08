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
                <form action="<?= $URL->getController("Register", "Register") ?>" method="post">
                    <div class="form-segment">
                        <h1 class="segment-title">Signup</h1>
                        <div class="multi-row">
                            <div class="set">
                                <label for="Sirname">Sirname</label>
                                <input type="text" name="sirname" id="sirname" class="form-input" placeholder="Sirname" required>
                            </div>
                            <div class="set">
                                <label for="FirstName">Firstname</label>
                                <input type="text" name="firstname" id="firstname" class="form-input" placeholder="Firstname" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="set">
                                <label for="FatherName">Father Name</label>
                                <input type="text" name="fathername" id="fathername" class="form-input" placeholder="Father Name" required>
                            </div>
                        </div>
                        <div class="multi-row">
                            <div class="set">
                                <label for="">Date Of Birth</label>
                                <input type="date" name="DOB" id="DOB" class="form-input" required>
                            </div>
                            <div class="set">
                                <label for="Gender">Gender</label>
                                <select name="gender" id="gender" class="form-input">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
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

</html>