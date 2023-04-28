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
function Login($USER_TABLE)
{
    foreach ($USER_TABLE as $key => $value) {
        $_SESSION[$key] = $value;
    }
    $_SESSION["Loggedin"] = boolval(true);
    header("Location: ../dashboard/dashboard.php");
}
// Login...Ends

function Logout($USER_TABLE)
{
    foreach ($$USER_TABLE as $key) {
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
function alert($msg, $path)
{
    echo "<script>";
    echo "alert('$msg');";
    echo "window.location.assign('$path');";
    echo "</script>";
}
// Alert...Ends

// Referesh Sessions....
function unsetUserSessions(array $sessionKeys)
{
    foreach ($sessionKeys as $key) {
        unset($_SESSION[$key]);
    }
    return true;
}

function refreshUserSessions(array $userSessionData)
{
    $needUnset = $userSessionData;

    $sessionKeys = array_keys($needUnset);
    unsetUserSessions($sessionKeys);

    foreach ($userSessionData as $key => $value) {
        $_SESSION[$key] = $value;
    }
    return true;
}

// Referesh Sessions....Ends

// Compare 2 values
function equals($val1, $val2, bool $strict = false)
{
    if ($strict === boolval(true)) {
        if ($val1 === $val2) {
            return boolval(true);
        }
        return boolval(false);
    } else {
        if ($val1 == $val2) {
            return boolval(true);
        }
        return boolval(false);
    }
}
// Compare 2 values..ENds

// Skip Iteration For...
function except(array $dataToSkip, ...$skipFor)
{
    foreach ($dataToSkip as $key) {
        if ($key === $skipFor) {
            continue;
        }
    }
}
// Skip Iteration For...Ends