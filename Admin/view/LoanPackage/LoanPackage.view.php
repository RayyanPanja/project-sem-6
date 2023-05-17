<?php
require "../../app/Classes/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Applications</title>
    <?= Route::getCSS("Style") ?>
</head>

<body>
    <?php include("../../app/Components/AuthForms.cont.php"); ?>
    <?php include("../../app/Components/indexNav.cont.php"); ?>
    <main class="padding-top">
        <section class="center-form">
            <div class="loan-package-form">
                <form action="<?= Route::getController("AddPackage", "AddPackageControllers") ?>" method="post">
                    <div class="form-segment">
                        <h1 class="segment-title">Package Details</h1>
                        <div class="row">
                            <div class="set">
                                <label for="PackageName">Package Name</label>
                                <input type="text" name="PackageName" id="PackageName" class="form-input" placeholder="Package Name" required>
                            </div>
                        </div>
                        <div class="multi-row">
                            <div class="set">
                                <label for="PackageAmount">Package Amount</label>
                                <input type="number" name="PackageAmount" id="PackageAmount" class="form-input" placeholder="Package Amount" required>
                            </div>
                            <div class="set">
                                <label for="Sponsor">Sponsor</label>
                                <input type="text" name="Sponsor" id="Sponsor" class="form-input" placeholder="Package Sponosor" required>
                            </div>
                        </div>
                        <div class="multi-row">
                            <div class="set">
                                <label for="MaxUsers">Max Users</label>
                                <input type="number" name="MaxUsers" id="MaxUsers" min="5" max="10" class="form-input" value="5">
                            </div>
                            <div class="set">
                                <label for="Interest">Interest Rate</label>
                                <input type="number" name="Interest" id="Interest" min="0" max="30" class="form-input" value="5" placeholder="%">
                            </div>
                            <div class="set">
                                <label for="LoanTerm">LoanTerm (in Year)</label>
                                <input type="number" name="LoanTerm" id="LoanTerm" min="0" max="40" class="form-input" value="5" placeholder="In Years">
                            </div>
                        </div>
                        <div class="row">
                            <label for="Terms">Terms & Conditions.</label>
                            <textarea name="Terms" id="Terms" cols="30" rows="5" class="form-input">--Terms--and--Conditions--</textarea>
                        </div>
                    </div>
                    <div class="form-btn-set">
                        <button type="reset" class="form-btn secodary-btn warn">Cancle</button>
                        <button type="submit" class="form-btn primary-btn">Upload</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>