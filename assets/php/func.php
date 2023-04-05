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

function Login($Account, $Password, $Email, $Sirname, $Name, $FatherName, $Image , $Username)
{
    $_SESSION['Account'] = $Account;
    $_SESSION['Password'] = $Password;
    $_SESSION['Email'] = $Email;
    $_SESSION['Sirname'] = $Sirname;
    $_SESSION['Name'] = $Name;
    $_SESSION['Father'] = $FatherName;
    $_SESSION['image'] = $Image;
    $_SESSION['Username'] = $Username;
    $_SESSION['Loggedin'] = "true";
    header("Location: ../dashboard/dashboard.php");
}

function Logout()
{

    unset(
        $_SESSION["Account"],
        $_SESSION['Name'],
        $_SESSION['Password']
    );
    $_SESSION["Loggedin"] = "false";
}

function pa($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}