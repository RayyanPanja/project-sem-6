<?php
include_once "../connection.php";

$account = $_REQUEST['account'];
$password = $_REQUEST['password'];

function Login($Account, $Name, $Password, $SirName, $Father, $img)
{
    session_start();
    $_SESSION["Account"] = $Account;
    $_SESSION['Name'] = $Name;
    $_SESSION['Password'] = $Password;
    $_SESSION['Sirname'] = $SirName;
    $_SESSION['Father'] = $Father;
    $_SESSION['image'] = $img;
    header("Location:../../../home.php");
}

if (isset($account) && isset($password)) {
    $Acc;
    $PASS;
    $Name;
    $Father;
    $SirName;

    $fetch = "SELECT * FROM main WHERE `Account_number` = $account";
    $result = mysqli_query($con, $fetch);
    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $Acc = $data['Account_number'];
            $PASS =  $data['Password'];
            $Name =  $data['Firstname'];
            $Father = $data['Fathername'];
            $SirName = $data['Sirname'];
            $ImagePath = $data['Img_Path'];
        }
    }
    if ($account == $Acc) {
        if ($password == $PASS) {
            Login($account, $Name, $password, $SirName, $Father, $ImagePath);
        } else { ?>
            <script>
                alert("Incorrect Password")
                location.assign("../../../index.php");
            </script>
        <?php
        }
    } else { ?>
        <script>
            alert("Account Not Exist")
            location.assign("../../../index.php");
        </script>
<?php  } }
