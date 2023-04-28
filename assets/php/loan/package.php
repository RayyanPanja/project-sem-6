<?php
include_once "../connection.php";

$Account = $_SESSION['Account_number'];
$SirName = $_SESSION['Sirname'];
$Name = $_SESSION['Firstname'];
$FatherName = $_SESSION['Fathername'];
$Image = $_SESSION['Img_Path'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phase 2</title>

</head>

<body>
    <!-- Logout Form -->
    <dialog class="login-form" id="logout-dlg">
        <div class="login-img-holder">
            <img src="../../img/storage/<?= $Image; ?>" alt="Login">
        </div>
        <h1>Logout</h1>
        <form action="../auth/logout.php" method="post">
            <h1>Are You Sure You Want to Logout </h1>
            <div class="form-btn-set">
                <button class="form-btn primary-btn" type="submit">Logout</button>
                <button class="form-btn secondary-btn   " type="reset" id="logout-close">Cancle</button>
            </div>
        </form>
    </dialog>
    <!-- Logout Form...ENDS -->
    <!-- TERMS -->
    <dialog class="term-box" id="term-dlg">
        <h1 class="txt-center">Terms & Conditions.</h1>
        <ol>
            <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque modi cumque ratione aspernatur nihil consectetur.</li>
            <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque modi cumque ratione aspernatur nihil consectetur.</li>
            <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque modi cumque ratione aspernatur nihil consectetur.</li>
            <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque modi cumque ratione aspernatur nihil consectetur.</li>
        </ol>
        <button id="term-close" class="loan-btn">Agree</button>
    </dialog>
    <!-- TERMS...ends -->

    <!-- NAVBAR -->
    <?php
    include_once("../../components/MainNavbar.php");
    ?>
    <!-- NAVBAR -->

    <main style="padding-top: 5% ;">
        <h1 class="txt-center">Please Read Terms And Conditions Carefully</h1>
        <button class="term-btn" id="term-open">Terms & Conditions</button>
        <div class="loan-container">

            <h1 class="txt-center">Choose A Package.</h1>
            <div class="loan-packages-container">
                <?php
                $FETCH = "SELECT * FROM `schemes`;";
                $Result = mysqli_query($con, $FETCH);
                if (mysqli_num_rows($Result) > 0) {
                    while ($data = mysqli_fetch_assoc($Result)) { ?>
                        <div class="package-box">
                            <h1 class="package-name">
                                -{ <?php echo $data['Scheme_Name']; ?> }-
                            </h1>
                            <h2 class="package-amount">
                                <?php echo $data['Package']; ?> /-
                            </h2>
                            <div class="sponsor">
                                Sponsered By ( <?php echo $data['Sponsor']; ?> )
                            </div>
                            <div class="user-limit">
                                User-Limit: <?php echo $data['Users_Using']; ?> / <?php echo $data['Max_Users']; ?>
                            </div>
                            <div class="status">
                                <?php echo $data['Status']; ?>
                            </div>
                            <form action="processor/Apply.php" method="post">
                                <label for="Terms">
                                    <input type="checkbox" name="Agreement" id="agreement" required>
                                    Terms And Conditions
                                </label>
                                <input type="number" name="package-id" value="<?php echo $data['Scheme_ID']; ?>" class="hidden">
                                <input type="text" name="CONFIRM" placeholder="CONFIRM" class="term-input">
                                <p class="small-txt">Make Sure CONFIRM Should be in UPPERCASE</p>
                                <button class="loan-btn">Get</button>
                            </form>
                        </div>

                    <?php
                    }
                } else { ?>
            </div>
            <div class="membership-card">
                <h1>Become Preimum Member For More Loan Opportunities..</h1>
                <button class="simple-btn btn" onclick="window.location.assign('../membership/ui.php');">
                    100/- per Month
                </button>
            </div>

        <?php }
        ?>

        </div>
    </main>

</body>

<script>
    DialogHandler('term-open', 'term-close', 'term-dlg', true);
</script>

</html>