<?php
require "../../app/Classes/autoload.php";

$PackageTable = new Table("loan_packages", "Package_ID");
$LoanPackage = $PackageTable->select()->get_data_from_primary(Session::getSession("tempPackage"))[0];

$LoanTable = new Table("loan", "Application_ID");
$LoanData = $LoanTable->select()->where("Package_ID", Session::getSession("tempPackage"))->execute_query();
$req = new Request;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Details Of Loan Package</title>
    <?= Route::getCSS("Style") ?>
</head>

<body>

    <?php include("../../app/Components/AuthForms.cont.php"); ?>
    <?php include("../../app/Components/indexNav.cont.php"); ?>
    <main>
        <section class="user-full-detail">
            <section class="left-side">
                <div class="user-detail">
                    <div class="name" title="<?= $LoanPackage['Package_ID'] ?>">
                        <?= $LoanPackage["Package_Name"] ?>
                    </div>
                </div>
                <div class="control-btn-set">
                    <form action="<?= Route::getController("DeleteLoanPackage", "ManageLoanPackagesControllers") ?>" method="post">
                        <input type="hidden" name="packageid" value="<?= $LoanPackage['Package_ID'] ?>">
                        <button type="submit" class="form-btn alert">Delete Loan Package</button>
                    </form>
                    <form action="<?= Route::getController("PackageStatus", "ManageLoanPackagesControllers") ?>" method="post">
                        <input type="hidden" name="packageid" value="<?= $LoanPackage['Package_ID'] ?>">
                        <input type="hidden" name="status" value="<?= ($LoanPackage["Status"]) ? "Deactivate" : "Activate" ?>">
                        <button type="submit" class="form-btn <?= ($LoanPackage["Status"]) ? "warn" : "success" ?>"> <?= ($LoanPackage["Status"]) ? "Deactivate" : "Activate" ?> </button>
                    </form>
                </div>
            </section>
            <section class="panel padding-top">
                <div class="details">
                    <h1>Package Details</h1>
                    <table border="2">
                        <tr>
                            <th>Package ID</th>
                            <td><?= $LoanPackage["Package_ID"] ?> </td>
                        </tr>
                        <tr>
                            <th>Package Name</th>
                            <td><?= $LoanPackage["Package_Name"] ?> </td>
                        </tr>
                        <tr>
                            <th>Package Sponsor</th>
                            <td><?= $LoanPackage["Sponsor"] ?> </td>
                        </tr>
                        <tr>
                            <th>Amount</th>
                            <td><?= $LoanPackage["Package_Amount"] ?>/-</td>
                        </tr>
                        <tr>
                            <th>Maximum Users</th>
                            <td><?= $LoanPackage["Max_Users"] ?> </td>
                        </tr>
                        <tr>
                            <th>Users Using</th>
                            <td><?= $LoanPackage["Users_Using"] ?> </td>
                        </tr>
                    </table>
                </div>
                <div class="details">
                    <h1>Users</h1>
                    <table border="2">
                        <?php
                        for ($i = 0; $i < count($LoanData); $i++) { ?>
                            <tr>
                            <tr>
                                <th>User Account</th>
                                <td><?= $LoanData[$i]["Account_number"] ?></td>
                            </tr>
                            <tr>
                                <th>User Name</th>
                                <td><?= $LoanData[$i]["Name"] ?></td>
                            </tr>
                            </tr>
                        <?php } ?>
                    </table>
                </div>

                <div class="details x2">
                    <form action="<?= Route::getController("UpdateAmount", "ManageLoanPackagesControllers") ?>" method="post">
                        <div class="form-segment">
                            <h1 class="segment-title">Update Amount</h1>
                            <div class="row">
                                <div class="set">
                                    <label for="Amount">Amount</label>
                                    <input type="number" name="amount" id="Amount" class="form-input" placeholder="0/-" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="set">
                                    <label for="ConfirmAmount">Confirm Amount</label>
                                    <input type="number" name="coamountnfirmamount" id="ConfirmAmount" class="form-input" placeholder="0/-" required>
                                </div>
                            </div>
                            <input type="hidden" name="packageid" value="<?= $LoanPackage['Package_ID'] ?>">
                        </div>
                        <div class="form-btn-set">
                            <button type="reset" class="form-btn secondary-btn">Clear</button>
                            <button type="submit" class="form-btn primary-btn">Update</button>
                        </div>
                    </form>
                </div>

                <div class="details x2">
                    <form action="<?= Route::getController("UpdateTerms", "ManageLoanPackagesControllers") ?>" method="post">
                        <div class="form-segment">
                            <h1 class="segment-title">Update Terms & Conditions</h1>
                            <div class="row">
                                <label for="NewTerms">New Terms</label>
                                <textarea name="terms" id="terms" cols="30" rows="8" class="form-input"><?= $LoanPackage['Terms']; ?></textarea>
                            </div>
                            <input type="hidden" name="packageid" value="<?= $LoanPackage['Package_ID'] ?>">
                        </div>
                        <div class="form-btn-set">
                            <button type="reset" class="form-btn secondary-btn">Clear</button>
                            <button type="submit" class="form-btn primary-btn">Update</button>
                        </div>
                    </form>
                </div>
            </section>

        </section>
    </main>
</body>

</html>