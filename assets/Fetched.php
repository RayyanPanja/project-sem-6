<?php
include_once('php/connection.php');

function FetchFrom($con, string $table)
{
    $Array = array();
    $sql = "SELECT * FROM {$table}";
    $result = mysqli_query($con, $sql);

    while ($set = mysqli_fetch_assoc($result)) {
        array_push($Array, $set);
    }
    return $Array;
}

function searchData(array $table, string $key = "id", string $value)
{
    foreach ($table as $innerArray) {
        if (isset($innerArray[$key]) && $innerArray[$key] == $value) {
            return array(
                "data" => $innerArray,
                "boolean" => boolval(true)
            );
        }
    }
    return false;
}

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
