<?php
include_once('php/connection.php');

// this func will fetch data and store it into an Array....
function fetchAllFrom($con, string $table)
{
    $Array = array();
    $sql = "SELECT * FROM {$table}";
    $result = mysqli_query($con, $sql);

    while ($set = mysqli_fetch_assoc($result)) {
        array_push($Array, $set);
    }
    return $Array;
}


// this function returns an Object [Associative Array] 1 => data of given primary kry , 2 => boolean
function fetchWhere(array $table, string $key = "id", string $value, string $column = null)
{
    foreach ($table as $innerArray) {
        if (isset($innerArray[$key]) && $innerArray[$key] == $value) {
            if (is_null($column)) {
                return array(
                    "data" => $innerArray,
                    "boolean" => boolval(true)
                );
            } else {
                return array(
                    "data" => $innerArray[$column],
                    "boolean" => boolval(true)
                );
            }
        }
    }
    return false;
}


// Fetch with Multi Where Clause....
function fetchWithDualWhere($con, string $table, string $LogicalOperator, string $column1, string $value1, string $column2, string $value2)
{
    $Array = array();
    $sql = "SELECT * FROM {$table} WHERE {$column1} = {$value1} {$LogicalOperator} {$column2} = {$value2};";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($set = mysqli_fetch_assoc($result)) {
            array_push($Array, $set);
        }
        return $Array;
    } else {
        return boolval(false);
    }
}


// this Function will Write give input into Console as log....
function Write($var)
{
    echo "<script>";
    if (is_numeric($var)) {
        echo "console.log({$var});";
    } else if (is_bool($var)) {
        if ($var == boolval(true)) {
            echo "console.log('{true} is a Boolean');";
        } else {
            echo "console.log('{false} is a Boolean');";
        }
    } else if (is_array($var)) {
        foreach ($var as $key => $value) {
            echo "console.log('{$key} => {$value}');";
        }
    } else {
        echo "console.log('{$var}');";
    }
    echo "</script>";
}


// Delete From Table 
function deleteData($con, string $table, string $primaryKey = "id", string $value)
{
    $sql = "DELETE FROM {$table} WHERE {$primaryKey} = {$value}";
    $result = mysqli_query($con, $sql);
    if ($result) {
        return boolval(true);
    }
    return boolval(false);
}

// Update Table...
function UpdateTableData($con, string $table, array $dataSet, string $primaryKey = "id", $primaryKeyValue)
{
    foreach ($dataSet as $column => $dataValue) {
        $sql = "UPDATE {$table} SET `{$column}` = ? WHERE `{$primaryKey}` = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $dataValue, $primaryKeyValue);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    return boolval(true);
}
