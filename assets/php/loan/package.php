<?php
include "../connection.php";
 
$Account = $_SESSION['Account'];
$SirName = $_SESSION['Sirname'];
$Name = $_SESSION['Name'];
$FatherName = $_SESSION['Father'];
$Image = $_SESSION['image'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <!-- Logout Form -->
    <dialog class="login-form" id="logout-dlg">
        <div class="login-img-holder">
            <img src="../../img/storage/<?php echo $Image; ?>" alt="Login">
        </div>
        <h1>Logout</h1>
        <form action="../auth/logout.php" method="post">
            <h1>Are You Sure You Want to Logout </h1>
            <div class="login-btn-set">
                <button class="login-btn cool-btn" type="submit">Logout</button>
                <button class="cancle-btn cool-btn" type="reset" id="logout-close">Cancle</button>
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
    <nav class="navbar">
        <div class="logo">
            <h1>^w^</h1>
        </div>
        <div class="link-set">
            <a href="../../../home.php" class="link">Home</a>
            <a href="../dashboard/dashboard.php" class="link">DashBoard</a>
            <a href="../transfer/ui.php" class="link">Transfer</a>
            <a href="ui.php" class="link">Loan</a>
            <a href="../balance/ui.php" class="link">Balance</a>
            <a href="../contact/ui.php" class="link">Contact</a>
            <button type="submit" class="logout-btn" id="logout-open">Logout</button>
        </div>
        <div class="auth">
            <div class="user-detail-box">
                <div class="user-img-holder">
                    <img src="<?php echo "../../img/storage/" . $Image; ?>" alt="<?php echo $SirName . $Name . $FatherName; ?>">
                </div>
                <div class="">
                    <h1 class="user-name" title="<?php echo $SirName . " " . $Name . " " . $FatherName; ?>">
                        <?php
                        echo $Name;
                        ?>
                    </h1>
                </div>
            </div>
        </div>
    </nav>

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
<script src="../../js/Dialog.js"></script>
<script>
    DialogHandler('logout-open', 'logout-close', 'logout-dlg', true);
</script>
<script>
    DialogHandler('term-open', 'term-close', 'term-dlg', true);
</script>

</html>