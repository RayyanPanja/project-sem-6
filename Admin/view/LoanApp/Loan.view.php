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
        <section class="search-section">
            <form action="" method="post">
                <div class="row">
                    <div class="set">
                        <label for="Search">Search By Application ID</label>
                        <input type="search" name="search" id="search" class="form-input" placeholder="Search By Loan Application ID" required>
                    </div>
                </div>
                <div class="form-btn-set">
                    <button type="submit" class="form-btn primary-btn">Search</button>
                </div>
            </form>
        </section>
        <section class="ajax-screen loan-ajax-screen">
            
        </section>
    </main>
</body>
<?= Route::getJQuery(); ?>
<script>
    $(document).ready(function() {
        function loadManageLoan() {
            $.ajax({
                type: "post",
                url: "<?= Route::getAjax("Loan") ?>",
                success: function(response) {
                    $('.ajax-screen').html(response);
                },
            });
        }

        function searchLoan(value) {
            $.ajax({
                type: "post",
                url: "<?= Route::getAjax("Loan") ?>",
                data: {
                    search: value
                },
                success: function(response) {
                    $('.ajax-screen').html(response);
                },
            });
        }

        loadManageLoan();

        $("#search").on('input', function() {
            var value = $(this).val();
            searchLoan(value);
            if ($(this).val() === "") {
                loadManageLoan();
            }
        });
    });
</script>

</html>