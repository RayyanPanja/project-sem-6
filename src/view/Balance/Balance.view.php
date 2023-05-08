<?php
require "../../../back_end/Classes/All.class.php";
require "../../../back_end/include/include.php";
?>
<?php
if (is_null(MiddleWare::getAccessPermission()) || MiddleWare::getAccessPermission() === false) {
    MiddleWare::askPin();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balance</title>
    <link rel="stylesheet" href="<?= $URL->getCss("Style") ?>">
</head>

<body>
    <?php include('../component/mainNav.comp.php'); ?>
    <main>
        <section class="balance-section">
            <?php
            $UserTable = new Table("main", "Account_number");
            $User = $UserTable->fetchWhere("Account_number", Session::getSession("Account_number"))[0];
            ?>
            <div class="balance">
                <?= $User['Amount']; ?>
            </div>
        </section>
    </main>
</body>

</html>
<?php
Session::deleteSession("allowAccess");
?>