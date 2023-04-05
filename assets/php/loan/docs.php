<?php
include "../connection.php";

$Account = $_SESSION['Account'];
$SirName = $_SESSION['Sirname'];
$Name = $_SESSION['Name'];
$FatherName = $_SESSION['Father'];
$Image = $_SESSION['image'];

$Application_ID = $_SESSION['TempAppID'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>

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
    <!-- NAVBAR -->
    <?php
    include("../../components/MainNavbar.php");
    ?>
    <!-- NAVBAR -->

    <main style="padding-top: 5%;">
        <h1 class="txt-center">Please Upload Following Documents To Proceed Futher...</h1>
        <form action="processor/GetDoc.php" enctype="multipart/form-data" method="post">
            <h2 class="txt-center">Please Only Use .jpg file</h2>
            <h2 class="txt-center">All Fields Are required</h2>
            <div class="doc-grid">
                <div class="doc">
                    <label for="file-input-1">Passport Size Photo</label>
                    <input type="file" id="file-input-1" name="photo" required>
                </div>
                <div class="doc">
                    <label for="file-input-2">Adhar Card</label>
                    <input type="file" id="file-input-2" name="adharcard" required>
                </div>
                <div class="doc">
                    <label for="file-input-3">Passbook</label>
                    <input type="file" id="file-input-3" name="passbook" required>
                </div>
                <div class="doc">
                    <label for="file-input-4">Chequebook</label>
                    <input type="file" id="file-input-4" name="chequebook" required>
                </div>
            </div>
            <button class="doc-submit">Submit</button>
        </form>

    </main>

</body>
<script src="../../js/Func.js"></script>
<script>
    DialogHandler('logout-open', 'logout-close', 'logout-dlg', true);
</script>
<script>
    const fileInputs = document.querySelectorAll('input[type="file"]');
    const fileButtons = document.querySelectorAll('label[for^="file-input-"]');

    fileInputs.forEach(function(fileInput, i) {
        const fileButton = fileButtons[i];

        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                fileButton.textContent = fileInput.files[0].name;
            } else {
                fileButton.textContent = 'Choose file';
            }
        });
    });
</script>

</html>