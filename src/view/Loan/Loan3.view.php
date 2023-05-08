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
        <p>Application ID: <?= Session::getSession('tempAppID') ?></p>
        <section class="grid-center">
            <div class="loan-form-container">
                <form action="<?= $URL->getController("Step3", "Loan") ?>" method="post" enctype="multipart/form-data">
                    <div class="form-segment">
                        <h1 class="segment-title">Upload Documents</h1>
                        <div class="file-input-group">
                            <div class="set">
                                <label class="file-label" for="AdharCard">Adhar Card</label>
                                <input type="file" name="adharcard" id="acard" class="form-input">
                            </div>
                            <div class="set">
                                <label class="file-label" for="ChequeBook">ChequeBook</label>
                                <input type="file" name="chequebook" id="cbook" class="form-input">
                            </div>
                            <div class="set">
                                <label class="file-label" for="PassBook">PassBook</label>
                                <input type="file" name="passbook" id="pbook" class="form-input">
                            </div>
                            <div class="set">
                                <label class="file-label" for="Image">Passport Size Image</label>
                                <input type="file" name="passportimage" id="psimage" class="form-input">
                            </div>
                        </div>
                    </div>
                    <div class="form-btn-set">
                        <button type="reset" class="form-btn secondary-btn">Cancle</button>
                        <button type="submit" class="form-btn primary-btn">Submit</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
<script src="<?= $URL->getJs("FileInput") ?>"></script>

</html>