<?php
include('../../connection.php');
$ForAcc;
if (isset($_REQUEST['accno'])) {
    $ForAcc = $_REQUEST['accno'];
} else {
    $ForAcc = $_SESSION['DetailAcc'];
}
$Array = array();

$Name = "Guest";

$fetchAcc = "SELECT * FROM main WHERE `Account_number` = $ForAcc";
$set = mysqli_query($con, $fetchAcc);
$data = mysqli_fetch_assoc($set);

foreach ($data as $key => $value) {
    if ($key == "Account_number" || $key == "Created" || $key == "Fathername"  || $key == "Firstname" || $key == "Sirname"  || $key == "Password"  || $key == "Img_Path" || $key == "Blocked") {
        switch ($key) {
            case $key:
                array_push($Array, $value);
                break;
        }
    } else {
        continue;
    }
}
$isBanned = $Array[7];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Of <?= $ForAcc ?></title>
</head>

<body>
    <?php include('../../../components/MainNavbar.php') ?>
    <main class="detail-main-sec">
        <div class="side-nav">
            <div class="pfp">
                <img src="../../../../../assets/img/storage/<?= $Array[5] ?>" alt="Img">
            </div>
            <h1>Acc: <?= $ForAcc ?></h1>
            <div class="action-btns">
                <a href="../../Deposit/ui.php" class="form-btn primary-btn">Deposit Amount</a>
                <form action="Delete/Delete.php" method="post">
                    <input type="hidden" name="acc" value="<?= $ForAcc ?>">
                    <button type="submit" class="form-btn danger-btn">Delete Account</button>
                </form>
                <?php if ($isBanned == 0) { ?>
                    <form action="Bann/bann.php" method="post">
                        <input type="hidden" name="acc" value="<?= $ForAcc ?>">
                        <button type="submit" class="form-btn danger-btn">Bann Account</button>
                    </form>
                <?php } else { ?>
                    <form action="Bann/unbann.php" method="post">
                        <input type="hidden" name="acc" value="<?= $ForAcc ?>">
                        <button type="submit" class="form-btn success-btn">Unbann Account</button>
                    </form>
                <?php } ?>
            </div>
        </div>

        <div class="detail-container">
            <div class="banner">
                <h1 class="name">
                    <?= $Array[1] . " " . $Array[2] . " " . $Array[3] ?> - <?= $ForAcc ?>
                </h1>
            </div>

            <div class="container border">
                <table class="detail">
                    <?php
                    foreach ($data as $key => $value) {
                    ?>
                        <tr>
                            <?php
                            if ($key == "Account_number"  || $key == "Created" || $key == "Fathername"  || $key == "Firstname" || $key == "Sirname"  || $key == "Password"  || $key == "Img_Path") {
                                continue;
                            }
                            ?>
                            <th class="key"><?= $key ?></th>
                            <td class="value"><?= $value ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </main>
    
    <?php
    // if you UnComment this Code you will See Array in Console
    // pa($Array);
    ?>

</body>

</html>