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

</head>

<body>
    <!-- Navbar -->
    <?php include("../../components/MainNavbar.php"); ?>
    <!-- Navbar -->
    <main>
        <section class="flex flex-col g-5">
            <div class="menu-bar">
                <form action="" method="get">
                    <div class="search-wrapper">
                        <input type="search" name="search" id="search" class="search-bar" placeholder="e.g. 12344">
                        <button type="submit" class="search-btn ">Search</button>
                    </div>
                </form>
            </div>
            <div class="search-grid" id="search-grid">


                <div class="list">
                <h1 class="giant-text center">Seach Accounts</h1>
                    <!-- <h1 class="account-number">9786</h1>
                    <span class="fullname">Panja Rayyan Gulamhusen</span>
                    <form action="" method="post">
                        <div class="btn-set">
                            <input type="hidden" name="account" value="0">
                            <input type="number" name="amount" id="amount" class="form-input">
                            <button class="form-btn primary-btn">Deposit</button>
                        </div>
                    </form> -->
                </div>

            </div>
        </section>
    </main>
</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js' integrity='sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==' crossorigin='anonymous'></script>
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var val = $(this).val();
            if (val.trim() != "") {
                $.ajax({
                    url: 'fetch_acc.php',
                    method: 'POST',
                    data: {
                        search: val
                    },
                    success: function(data) {
                        $('#search-grid').html(data);
                    }
                });
            }else{
                $('#search-grid').html("<h1 class='giant-text center'>Seach Accounts</h1>");
            }
        });
    });
</script>

</html>