<?php
function SuperUpdate($con, $table, $column, $data, $primaryKey, $key)
{
    // Prepare the update query
    $stmt = mysqli_prepare($con, "UPDATE $table SET $column = ? WHERE $primaryKey = ?");
    mysqli_stmt_bind_param($stmt, "ss", $data, $key);

    // Execute the query
    if (mysqli_stmt_execute($stmt)) {
        // Update successful
        mysqli_stmt_close($stmt);
        return true;
    } else {
        // Update failed
        mysqli_stmt_close($stmt);
        return false;
    }
}

function Seperate($string, $char)
{
    return explode($char, $string);
}

// Login...
function Login($UserTable)
{
    foreach ($UserTable as $key => $value) {
        $_SESSION[$key] = $value;
    }
    $_SESSION["Loggedin"] = boolval(true);
    header("Location: ../dashboard/dashboard.php");
}
// Login...Ends

function Logout($UserTable)
{
    foreach ($$UserTable as $key => $value) {
        unset(
            $_SESSION[$key]
        );
    }
    $_SESSION["Loggedin"] = boolval(false);

    header("Location: ../../../index.php");
}

function pa($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
// Print Array in Console
function pca($arr, $withKey = false, $AnyMSG = null)
{
    $array = $arr;
    if ($withKey == false) {
        echo "<script>";
        foreach ($array as $value) {
            echo "
            console.log('$AnyMSG: $value');
            ";
        }
    } else {
        echo "<script>";
        foreach ($array as $key => $value) {
            echo "
            console.log('$key , $value');
            ";
        }
    }
    echo "</script>";
}
// Print Array in Console...ENds

// Alert...
function alert(string $msg, string $path)
{
    echo "<script>";
    echo "alert({$msg})";
    echo "window.location.assign({$path})";
    echo "</script>";
}
// Alert...Ends