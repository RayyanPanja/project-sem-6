<?php
include "../connection.php";
$acc = $_SESSION['Account_number'];
$name = $_SESSION['Firstname'];
$username = $_SESSION['Username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings-<?= $acc ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main class="grid-with-side-nav">
        <!-- Side Nav -->
        <?php include('component/sidenav.php'); ?>
        <!-- Side Nav -->
        <section class="scroll-able">

            <section id="Update" class="update-section">
                <div class="banner">
                    <h1>Hii!! <?= $name ?>, Look Around if You Wish to Update Your Profile</h1>
                </div>
                <div class="settings-form-set">
                    <!-- Name -->
                    <form action="Update/SingleFile/name.php" method="post">
                        <div class="form-segment">
                            <h2 class="segment-title">Name</h2>
                            <div class="settings-multi-row">
                                <div class="settings-set">
                                    <label for="Sirname">Sirname</label>
                                    <input type="text" name="sirname" id="sirname" value="<?= $_SESSION['Sirname'] ?>" class="form-input">
                                </div>
                                <div class="settings-set">
                                    <label for="Firstname">Firstname</label>
                                    <input type="text" name="firstname" id="firstname" value="<?= $_SESSION['Firstname'] ?>" class="form-input">
                                </div>
                                <div class="settings-set">
                                    <label for="Fathername">Father's name</label>
                                    <input type="text" name="fathername" id="fathername" value="<?= $_SESSION['Fathername'] ?>" class="form-input">
                                </div>
                            </div>
                            <div class="settings-form-btn-set">
                                <button type="reset" class="settings-form-btn secondary-btn ">Clear</button>
                                <button type="submit" class="settings-form-btn settings-primary-btn">Update</button>
                            </div>
                        </div>
                    </form>

                    <!-- Username -->
                    <form action="Update/SingleFile/username.php" method="post">
                        <div class="form-segment">
                            <h2 class="segment-title">Username</h2>
                            <div class="settings-row">
                                <div class="settings-set">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" value="<?= $_SESSION['Username'] ?>" class="form-input">
                                </div>
                            </div>
                            <div class="settings-form-btn-set">
                                <button type="reset" class="settings-form-btn secondary-btn ">Clear</button>
                                <button type="submit" class="settings-form-btn settings-primary-btn">Update</button>
                            </div>
                        </div>
                    </form>

                    <!-- Contact -->
                    <form action="Update/SingleFile/contact.php" method="post">
                        <div class="form-segment">
                            <h2 class="segment-title">Contact</h2>
                            <div class="settings-multi-row">
                                <div class="settings-set">
                                    <label for="Email">Email</label>
                                    <input type="email" name="email" id="email" value="<?= $_SESSION['Email'] ?>" class="form-input">
                                </div>
                                <div class="settings-set">
                                    <label for="Contact">Contact</label>
                                    <input type="number" name="contact" id="contact" value="<?= $_SESSION['Contact'] ?>" class="form-input">
                                </div>
                            </div>
                            <div class="settings-form-btn-set">
                                <button type="reset" class="form-btn settings-form-btn secondary-btn ">Clear</button>
                                <button type="submit" class="settings-form-btn settings-primary-btn">Update</button>
                            </div>
                        </div>
                    </form>

                    <!-- Address -->
                    <form action="Update/SingleFile/address.php" method="post">
                        <div class="form-segment">
                            <h2 class="segment-title">Address</h2>
                            <div class="settings-multi-row">
                                <div class="settings-set">
                                    <label for="Address">Address</label>
                                    <input type="text" name="address" id="address" value="<?= $_SESSION['Address'] ?>" class="form-input">
                                </div>
                                <div class="settings-set">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" value="<?= $_SESSION['City'] ?>" class="form-input">
                                </div>
                                <div class="settings-set">
                                    <label for="zipcode">Zipcode/Pincode</label>
                                    <input type="number" name="zipcode" id="zipcode" value="<?= $_SESSION['Pin_Code'] ?>" class="form-input">
                                </div>
                                <div class="settings-set">
                                    <label for="State">State</label>
                                    <input type="text" name="state" id="state" value="<?= $_SESSION['State'] ?>" class="form-input">
                                </div>
                                <div class="settings-set">
                                    <label for="Country">Country</label>
                                    <input type="text" name="country" id="country" value="<?= $_SESSION['Country'] ?>" class="form-input">
                                </div>
                            </div>
                            <div class="settings-form-btn-set">
                                <button type="reset" class="form-btn settings-form-btn secondary-btn ">Clear</button>
                                <button type="submit" class="settings-form-btn settings-primary-btn">Update</button>
                            </div>
                        </div>
                    </form>

                    <!-- Password -->
                    <form action="Update/Password/Recognize.php" method="get">
                        <div class="form-segment">
                            <h2 class="segment-title">Password</h2>
                            <div class="settings-multi-row">
                                <h1 class="form-title">Change Password??</h1>
                            </div>
                            <div class="settings-form-btn-set">
                                <!-- <button type="reset" class="form-btn settings-form-btn secondary-btn ">Clear</button> -->
                                <button type="submit" class="settings-form-btn settings-primary-btn">Change</button>
                            </div>
                        </div>
                    </form>
                </div>

            </section>
            <!-- Recovery -->
            <?php
            if ($_SESSION['Recovery'] === 0 || empty($_SESSION['Recovery'])) {
            ?>
                <section id="Recovery">
                    <div class="banner">
                        <h1>You Still Haven't Activated Recovery </h1>
                    </div>

                    <form action="Recovery/recovery.php" method="get">
                        <div class="form-segment">
                            <h2 class="segment-title">Recovery</h2>
                            <div class="settings-multi-row">
                                <h1 class="form-title">Setup Recovery</h1>
                            </div>
                            <div class="settings-multi-row">
                                <div class="settings-set">
                                    <label for="Numeric">Numeric Key</label>
                                    <input type="number" name="number" id="num" class="form-input" placeholder="e.g. <?= rand(00000, 999999) ?>">
                                </div>
                                <div class="settings-set">
                                    <label for="Alphabetic">Alphabetic Key</label>
                                    <input type="text" name="word" id="word" class="form-input" placeholder="e.g. xay-sad-cas-va">
                                </div>
                            </div>
                            <div class="settings-form-btn-set">
                                <button type="reset" class="form-btn settings-form-btn secondary-btn ">Clear</button>
                                <button type="submit" class="settings-form-btn settings-primary-btn">Set Up</button>
                            </div>
                        </div>
                    </form>
                </section>
            <?php } ?>
            <section id="LoanProgress">
                <div class="banner">
                    <h1>Oo , You Applied For Loan ??</h1>
                </div>

            </section>
        </section>
    </main>

</body>

</html>