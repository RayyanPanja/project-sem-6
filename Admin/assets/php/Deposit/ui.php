<?php
require "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charcol="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit Amount</title>
    <!-- CSS -->

</head>

<body>
    <!-- Navbar -->
    <?php require("../../components/MainNavbar.php"); ?>
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
                        <div class="multi-row g-5">
                            <div class="col">
                                <label for="Account Number">Account Number</label>
                                <input type="number" name="account" id="account" class="form-input" placeholder="e.g. 123456" required>
                            </div>
                            <div class="col">
                                <label for="Amount">Amount</label>
                                <input type="number" name="amount" id="account" class="form-input" placeholder="1000/-" required>
                            </div>
                            <div class="col">
                                <label for="CAmount">Confirm Amount</label>
                                <input type="number" name="confirmAmount" id="account" class="form-input" placeholder="Confirm Must be Same as Amount" required>
                            </div>
                        </div>
                        <div class="form-btn-set">
                            <button type="reset" class="form-btn form-btn secondary-btn ">Cancle</button>
                            <button type="submit" class="form-btn primary-btn">Deposit</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
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