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

</head>

<body>
    <!-- Navbar -->
    <?php include("../../components/MainNavbar.php"); ?>
    <!-- Navbar -->
    <main>
        <section class="flex flex-col g-5">
            <div class="menu-bar">
                <div class="search-wrapper">
                    <input type="search" name="search" id="search" class="search-bar" placeholder="e.g. 12344">
                </div>
            </div>
            <div id="search-options"></div>
        </section>
    </main>
</body>
<script>
    $(document).ready(() => {
        $.ajax({
            url: "fetch_accs.php",
            method: "POST",
            success: (data) => {
                $("#search-options").html(data)
            }
        });

        $('#search').on('keyup', () => {
            let val = $('#search').val();
            if (val.trim() === "") {
                $.ajax({
                    url: "fetch_accs.php",
                    method: "POST",
                    success: (data) => {
                        $("#search-options").html(data)
                    }
                });
            } else {
                $.ajax({
                    url: "fetch_accs.php",
                    method: "POST",
                    data: {
                        search: val
                    },
                    success: (data) => {
                        $("#search-options").html(data)
                    }
                });
            }
        });
    });
</script>

</html>