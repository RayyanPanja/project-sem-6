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
