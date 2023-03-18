<?php
// Function...
function Login($admin, $password, $desig, $name)
{
    $_SESSION['AdminID'] = $admin;
    $_SESSION['AdminPassword'] = $password;
    $_SESSION['AdminDesig'] = $desig;
    $_SESSION['AdminName'] = $name;
    header("Location: ../../../home.php");
}

function logout()
{
    session_destroy();
    header("Location: ../../../index.php");
}

function NumOfRows($con, $table, $wherecolumn = null, $wherevalue = null)
{
    if (is_null($wherecolumn) && is_null($wherevalue)) {
        $sql = "SELECT * FROM $table";
        $stmt = mysqli_prepare($con, $sql);
    } else {
        $sql = "SELECT * FROM $table WHERE $wherecolumn = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $wherevalue);
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return mysqli_num_rows($result);
}

// Function...Ends

?>