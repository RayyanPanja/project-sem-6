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
                <div class="search-wrapper">
                    <input type="search" name="search" id="search" class="search-bar" placeholder="e.g. 12344">
                </div>
            </div>
            <div class="screen">
                <div class="search-options" id="search-options"></div>
            </div>
            <div class="deposit-form">
                <form action="Deposit.php" method="post">
                    <div class="form-segment">
                        <h1 class="segment-title">Deposit Amount</h1>
                        <div class="dual-row g-5">
                            <div class="set">
                                <label for="Account Number">Account Number</label>
                                <input type="number" name="account" id="account" class="form-input" placeholder="e.g. 123456" required>
                            </div>
                            <div class="set">
                                <label for="Amount">Amount</label>
                                <input type="number" name="amount" id="account" class="form-input" placeholder="1000/-" required>
                            </div>
                            <div class="set">
                                <label for="CAmount">Confirm Amount</label>
                                <input type="number" name="confirmAmount" id="account" class="form-input" placeholder="Confirm Must be Same as Amount" required>
                            </div>
                        </div>
                        <div class="form-btn-set">
                            <button type="reset" class="form-btn secondary-btn">Cancle</button>
                            <button type="submit" class="form-btn primary-btn">Deposit</button>
                        </div>
                    </div>
                </form>
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
                        $('#search-options').html(data);
                    }
                });
            } else {
                $('#search-options').html("<div class='default'>Seach Accounts</div>");
            }
        });
    });
</script>

</html>