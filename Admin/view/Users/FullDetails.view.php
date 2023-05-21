<?php
require "../../app/Classes/autoload.php";

$UserTable = new Table("main", "Account_number");
$User = $UserTable->select()->get_data_from_primary(Session::getSession("AccountDetails"))[0];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Details Of User</title>
    <?= Route::getCSS("Style") ?>
</head>

<body>
    <?php include("../../app/Components/AuthForms.cont.php"); ?>
    <?php include("../../app/Components/indexNav.cont.php"); ?>
    <main>
        <section class="user-full-detail">
            <section class="left-side">
                <div class="user-detail">
                    <div class="img-holder">
                        <img src="<?= Route::getProfile($User['Img_Path']) ?>" alt="User">
                    </div>
                    <div class="name" title="<?= $User['Email'] ?>">
                        <?= $User["Username"] ?>
                    </div>
                </div>
                <div class="control-btn-set">
                    <form action="<?= Route::getController("DeleteUser", "ManageUserControllers") ?>" method="post">
                        <input type="hidden" name="account" value="<?= $User['Account_number'] ?>">
                        <button type="submit" class="form-btn alert">Delete User</button>
                    </form>
                    <a href="<?= Route::getView("Deposit", "DepositAmount") ?>" class="form-btn primary">Deposit Money</a>
                    <?php
                    if ($User['Blocked'] == boolval(false)) { ?>
                        <form action="<?= Route::getController("BanUser", "ManageUserControllers") ?>" method="post">
                            <input type="hidden" name="account" value="<?= $User['Account_number'] ?>">
                            <button type="submit" class="form-btn warn">Bann User</button>
                        </form>
                    <?php } else { ?>
                        <form action="<?= Route::getController("UnBanUser", "ManageUserControllers") ?>" method="post">
                            <input type="hidden" name="account" value="<?= $User['Account_number'] ?>">
                            <button type="submit" class="form-btn success">UnBann User</button>
                        </form>
                    <?php } ?>
                    <a href="" class="form-btn success">Reward User</a>
                </div>
            </section>
            <section class="panel padding-top">
                <div class="details">
                    <h1>Personal Details</h1>
                    <table border="2">
                        <tr>
                            <th>Full Name</th>
                            <td><?= $User["Sirname"] ?> <?= $User["Firstname"] ?> <?= $User["Fathername"] ?> </td>
                        </tr>
                        <tr>
                            <th>Date Of Birth</th>
                            <td><?= $User["Date_Of_Birth"] ?></td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td><?= $User["Gender"] ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $User["Email"] ?></td>
                        </tr>
                        <tr>
                            <th>Contact</th>
                            <td><?= $User["Contact"] ?></td>
                        </tr>
                    </table>
                </div>

                <div class="details">
                    <h1>Account Details</h1>
                    <table border="2">
                        <tr>
                            <th>Account Number</th>
                            <td><?= $User["Account_number"] ?></td>
                        </tr>
                        <tr>
                            <th>Amount</th>
                            <td><?= $User["Amount"] ?>/-</td>
                        </tr>
                        <tr>
                            <th>Loan Requested</th>
                            <td><?= ($User["Loan_requested"]) ? "Yes" : "No" ?></td>
                        </tr>
                        <tr>
                            <th>Loan Taken</th>
                            <td><?= ($User["Loan_taken"]) ? "Yes" : "No" ?></td>
                        </tr>
                        <tr>
                            <th>Blocked? </th>
                            <td><?= ($User["Blocked"]) ? "Yes" : "No" ?></td>
                        </tr>
                    </table>
                </div>

                <div class="details x2">
                    <h1>Address</h1>
                    <table border="2">
                        <tr>
                            <th>Address</th>
                            <td><?= $User['Address'] ?></td>
                        </tr>
                        <tr>
                            <th>City - PinCode</th>
                            <td><?= $User['City'] ?>-<?= $User['Pin_Code'] ?></td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td><?= $User['State'] ?></td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td><?= $User['Country'] ?></td>
                        </tr>
                    </table>
                </div>


            </section>

        </section>
    </main>
</body>

</html>