<?php
include "../connection.php";
 
$Acc = $_SESSION['TempAcc'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <h1 align="center">Congratulations!!!</h1>
    <div class="signup-form-container">
        <h1 align="center">Account Created Successfully</h1>
        <h1 align="center">Account Number:- <?php echo $Acc; ?></h1>
        <h3 class="note">* Please Deposit a minimum of 1000/- INR within 30 active days else Your Account Will be terminated..</h3>
        <button class="return-btn" id="return">Return To Home Page</button>
    </div>
    <script>
        const ReturnBTN = document.querySelector('#return');
        ReturnBTN.addEventListener('click',()=>{
            window.location.assign("../../../index.php");
        })
    </script>
</body>

</html>
<?php
session_destroy();
?>