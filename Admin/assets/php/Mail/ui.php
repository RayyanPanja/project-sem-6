<?php include_once('../connection.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mails</title>
</head>

<body>
    <?php include_once('../../components/MainNavbar.php'); ?>
    <main>
        <h1 class="text-center big-text">Mails</h1>
        <section class="flex flex-col g-5">
            <div class="menu-bar">
                <div class="search-wrapper">
                    <input type="search" name="search" id="search" class="search-bar" placeholder="Specific Mail?">
                </div>
            </div>
            <div class="mail-container" id="mails">

            </div>
        </section>

    </main>
</body>
<script>
    $(document).ready(() => {
        $.ajax({
            url: "fetch.php",
            method: "POST",
            success: (data) => {
                $("#mails").html(data)
            }
        });

        $('#search').on('keyup', () => {
            let val = $('#search').val();
            if (val.trim() === "") {
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    success: (data) => {
                        $("#mails").html(data)
                    }
                });
            } else {
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: {
                        search: val
                    },
                    success: (data) => {
                        $("#mails").html(data)
                    }
                });
            }
        });
    });
</script>

</html>