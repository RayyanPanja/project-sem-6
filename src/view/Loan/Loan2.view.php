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
    <title>Loan Application</title>
    <link rel="stylesheet" href="<?= $URL->getCss("Style") ?>">
</head>

<body>
    <?php include('../component/mainNav.comp.php'); ?>
    <main>
        <section class="grid-center p-t-5">
            <div class="loan-package-container">
                <p>Application ID: <?= Session::getSession('tempAppID')?></p>
                <h1 class="segment-title">Select Loan Package</h1>
                <div class="loan-package-grid">
                    <?php
                    $LoanPackagesTable = new Table("loan_packages", "Package_ID");
                    $LoanPackages = $LoanPackagesTable->fetchTable();
                    if (is_array($LoanPackages)) {
                        for ($i = 0; $i < count($LoanPackages); $i++) { ?>
                            <dialog class="terms" id="term-for-<?= $LoanPackages[$i]["Package_ID"] ?>">
                                <div class="top-dlg-sec">
                                    <h1>Terms & Conditions</h1>
                                    <button class="x-btn" id="close-for-<?= $LoanPackages[$i]["Package_ID"] ?>">X</button>
                                </div>
                                <div class="term-text">
                                    <?= $LoanPackages[$i]['Terms'] ?>
                                </div>
                            </dialog>
                            <div class="loan-package-wrapper">
                                <div class="package-top-segment">
                                    <div class="package-id">id: <?= $LoanPackages[$i]["Package_ID"] ?></div>
                                    <div class="package-status"><?= $LoanPackages[$i]["Status"] ?></div>
                                </div>

                                <button type="submit" class="form-btn primary-btn" id="open-for-<?= $LoanPackages[$i]["Package_ID"] ?>">Terms & Condition</button>

                                <div class="package-middle-segment">
                                    <div class="package-name"><?= $LoanPackages[$i]["Package_Name"] ?></div>
                                    <div class="package-amount"><?= $LoanPackages[$i]["Package_Amount"] ?></div>
                                    <div class="border">
                                        <form action="<?= $URL->getController("Step2", "Loan") ?>" method="post">
                                            <input type="number" name="package_id" id="pkid" class="form-input text-center" placeholder="Package Id" required>
                                            <input type="text" name="confirm" class="form-input text-center" placeholder="TYPE: CONFIRM" required>
                                            <input type="checkbox" name="terms" required>Terms & Condition
                                            <div class="form-btn-set">
                                                <button type="submit" class="form-btn primary-btn">Get</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="package-bottom-segment">
                                    <div class="package-sponsor"><?= $LoanPackages[$i]["Sponsor"] ?></div>
                                    <div class="user-set">
                                        <div class="user"><?= $LoanPackages[$i]["Users_Using"] ?></div>/<div class="user"><?= $LoanPackages[$i]["Max_Users"] ?></div>
                                    </div>
                                </div>

                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </section>
    </main>
</body>
<script src="<?= $URL->getJs("LoanTerms") ?>"></script>
<script>
    <?php
    for ($i = 0; $i < count($LoanPackages); $i++) { ?>
        TermsHandle("open-for-<?= $LoanPackages[$i]["Package_ID"] ?>", "term-for-<?= $LoanPackages[$i]["Package_ID"] ?>", "close-for-<?= $LoanPackages[$i]["Package_ID"] ?>");
    <?php }
    ?>
</script>

</html>