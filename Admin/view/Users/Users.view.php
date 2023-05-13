<?php
require "../../app/Classes/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <?= Route::getCSS("Style") ?>
</head>

<body>
    <?php include("../../app/Components/AuthForms.cont.php"); ?>
    <?php include("../../app/Components/indexNav.cont.php"); ?>
    <main class="padding-top">
        <section class="search-section">
            <form action="" method="post">
                <div class="row">
                    <div class="set">
                        <label for="Search">Search By Account</label>
                        <input type="search" name="search" id="search" class="form-input" placeholder="Search By Account Number" required>
                    </div>
                </div>
                <div class="form-btn-set">
                    <button type="submit" class="form-btn primary-btn">Search</button>
                </div>
            </form>
        </section>
        <section class="ajax-screen user-ajax-screen"></section>
    </main>
</body>
<?= Route::getJQuery(); ?>
<script>
    $(document).ready(function() {
        function loadManageUser() {
            $.ajax({
                type: "post",
                url: "<?= Route::getAjax("ManageUser") ?>",
                success: function(response) {
                    $('.ajax-screen').html(response);
                },
            });
        }

        function searchUser(value) {
            $.ajax({
                type: "post",
                url: "<?= Route::getAjax("ManageUser") ?>",
                data: {
                    search: value
                },
                success: function(response) {
                    $('.ajax-screen').html(response);
                },
            });
        }

        loadManageUser();

        $("#search").on('input', function() {
            var value = $(this).val();
            searchUser(value);
            if ($(this).val() === "") {
                loadManageUser();
            }
        });
    });
</script>

</html>