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
        <nav class="settings-side-nav">
            <div class="settings-profile-wrapper">
                <div class="settings-img-holder">
                    <img src="../../img/storage/<?= $_SESSION['Img_Path'] ?>" alt="">
                </div>
                <div class="name-holder">
                    <h1 title="<?= $_SESSION['Email'] ?>"><?= $name; ?></h1>
                    <h3><?= $username; ?></h3>
                    <form action="Update/ImageUpdate/ui.php" method="get">
                        <button type="submit" class="form-btn primary-btn">Change Profile Pic</button>
                    </form>
                </div>
            </div>
            <div class="settings-link-set">
                <a href="<?= $URL ?>/home.php" class="settings-link">Home</a>
                <a href="#Update" class="settings-link">Update Profile</a>
                <a href="#LoanProgress" class="settings-link">Track Loan Progress</a>
                <a href="" class="settings-link">Reply to You Message</a>
            </div>
        </nav>
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
                            <div class="multi-row">
                                <div class="set">
                                    <label for="Sirname">Sirname</label>
                                    <input type="text" name="sirname" id="sirname" value="<?= $_SESSION['Sirname'] ?>" class="form-input">
                                </div>
                                <div class="set">
                                    <label for="Firstname">Firstname</label>
                                    <input type="text" name="firstname" id="firstname" value="<?= $_SESSION['Firstname'] ?>" class="form-input">
                                </div>
                                <div class="set">
                                    <label for="Fathername">Father's name</label>
                                    <input type="text" name="fathername" id="fathername" value="<?= $_SESSION['Fathername'] ?>" class="form-input">
                                </div>
                            </div>
                            <div class="form-btn-set">
                                <button type="reset" class="form-btn secondary-btn">Clear</button>
                                <button type="submit" class="form-btn primary-btn">Update</button>
                            </div>
                        </div>
                    </form>

                    <!-- Username -->
                    <form action="Update/SingleFile/username.php" method="post">
                        <div class="form-segment">
                            <h2 class="segment-title">Username</h2>
                            <div class="row">
                                <div class="set">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" value="<?= $_SESSION['Username'] ?>" class="form-input">
                                </div>
                            </div>
                            <div class="form-btn-set">
                                <button type="reset" class="form-btn secondary-btn">Clear</button>
                                <button type="submit" class="form-btn primary-btn">Update</button>
                            </div>
                        </div>
                    </form>

                    <!-- Contact -->
                    <form action="Update/SingleFile/contact.php" method="post">
                        <div class="form-segment">
                            <h2 class="segment-title">Contact</h2>
                            <div class="multi-row">
                                <div class="set">
                                    <label for="Email">Email</label>
                                    <input type="email" name="email" id="email" value="<?= $_SESSION['Email'] ?>" class="form-input">
                                </div>
                                <div class="set">
                                    <label for="Contact">Contact</label>
                                    <input type="number" name="contact" id="contact" value="<?= $_SESSION['Contact'] ?>" class="form-input">
                                </div>
                            </div>
                            <div class="form-btn-set">
                                <button type="reset" class="form-btn secondary-btn">Clear</button>
                                <button type="submit" class="form-btn primary-btn">Update</button>
                            </div>
                        </div>
                    </form>

                    <!-- Address -->
                    <form action="Update/SingleFile/address.php" method="post">
                        <div class="form-segment">
                            <h2 class="segment-title">Address</h2>
                            <div class="multi-row">
                                <div class="set">
                                    <label for="Address">Address</label>
                                    <input type="text" name="address" id="address" value="<?= $_SESSION['Address'] ?>" class="form-input">
                                </div>
                                <div class="set">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" value="<?= $_SESSION['City'] ?>" class="form-input">
                                </div>
                                <div class="set">
                                    <label for="zipcode">Zipcode/Pincode</label>
                                    <input type="number" name="zipcode" id="zipcode" value="<?= $_SESSION['Pin_Code'] ?>" class="form-input">
                                </div>
                                <div class="set">
                                    <label for="State">State</label>
                                    <input type="text" name="state" id="state" value="<?= $_SESSION['State'] ?>" class="form-input">
                                </div>
                                <div class="set">
                                    <label for="Country">Country</label>
                                    <input type="text" name="country" id="country" value="<?= $_SESSION['Country'] ?>" class="form-input">
                                </div>
                            </div>
                            <div class="form-btn-set">
                                <button type="reset" class="form-btn secondary-btn">Clear</button>
                                <button type="submit" class="form-btn primary-btn">Update</button>
                            </div>
                        </div>
                    </form>

                    <!-- Password -->
                    <form action="Update/Password/Recognize.php" method="get">
                        <div class="form-segment">
                            <h2 class="segment-title">Password</h2>
                            <div class="multi-row">
                                <h1 class="form-title">Change Password??</h1>
                            </div>
                            <div class="form-btn-set">
                                <!-- <button type="reset" class="form-btn secondary-btn">Clear</button> -->
                                <button type="submit" class="form-btn primary-btn">Change</button>
                            </div>
                        </div>
                    </form>
                </div>

            </section>

            <section id="LoanProgress">
                <div class="banner">
                    <h1>Oo , You Applied For Loan ??</h1>
                </div>

            </section>
        </section>
    </main>

</body>

</html>