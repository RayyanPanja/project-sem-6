<?php
include "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit Amount</title>
    <!-- ICONS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.css' integrity='sha512-+ouAqATs1y4kpPMCHfKHVJwf308zo+tC9dlEYK9rKe7kiP35NiP+Oi35rCFnc16zdvk9aBkDUtEO3tIPl0xN5w==' crossorigin='anonymous' />
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/Style.css">
</head>

<body>
    <nav class="navbar">
        <div class="link-set">
            <a href="../../../home.php" class="link">Home</a>
            <a href="ui.php" class="link">Deposit Amount</a>
            <a href="../Loan/ui.php" class="link">Loan Applications</a>
            <a href="../Users/ui.php" class="link">User Details</a>
            <a href="help.html" class="link">Help</a>
        </div>
    </nav>
    <main>
        <section class="search-section">
            <h1 class="white-clr">Search By Account Number</h1>
            <form action="" method="get" class="search-box">
                <input type="search" name="search" id="search" placeholder="Account Number" class="search-bar" required>
                <button type="submit" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
            <div class="display">
                <?php
                if (isset($_REQUEST['search'])) {
                    $GetSearch = $_REQUEST['search'];

                    $fetch = "SELECT * FROM main WHERE `Account_number` = $GetSearch";
                    $Res = mysqli_query($con, $fetch);
                    if (mysqli_num_rows($Res) > 0) {
                        while ($data = mysqli_fetch_assoc($Res)) { ?>

                            <dialog id="image-dialog">
                                <button class="close" id="closeImage">X</button>
                                <img src="../../../../assets/img/storage/<?php echo $data['Img_Path']; ?>" alt="">
                            </dialog>

                            <div class="card">
                                <h1 class="card-name"><?php echo $data['Sirname'] . " " . $data['Firstname'] . " " . $data['Fathername']; ?></h1>
                                <form action="Deposit.php" method="post" class="card-form">
                                    <input type="text" name="account" class="hidden" value="<?php echo $data['Account_number']; ?>">
                                    <input type="number" name="amount" id="amount" class="card-input" placeholder="Rs.000">
                                    <input type="number" name="confirmamount" id="amount" class="card-input" placeholder="Confirm Amount">
                                    <button type="button" id="openImage" class="card-btn">Image</button>
                                    <button type="submit" class="form-btn primary-btn">Deposit</button>
                                </form>
                            </div>
                            <script src="../../js/Function.js"></script>
                            <script>
                                DialogHandler('openImage', 'closeImage', 'image-dialog', true);
                            </script>
                <?php
                        }
                    } else {
                        echo "<h1 class='white-clr text-center'>No Such Account</h1>";
                    }
                }

                ?>
            </div>
        </section>
    </main>
</body>

</html>