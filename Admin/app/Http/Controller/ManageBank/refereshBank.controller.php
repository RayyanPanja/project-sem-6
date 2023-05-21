<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REFERESHING</title>
</head>

<body>
    <?php
    require "../../../Classes/autoload.php";

    $bank = new Table("bank", "Account");
    $data = $bank->select()->execute_query()[0];
    if ($data['Amount'] !== $data['Amount_Before']) {
        Helper::updateBankAmount();
    }
    Helper::just_move(Route::getView("Bank", "ManageBank"));
    ?>
</body>

</html>