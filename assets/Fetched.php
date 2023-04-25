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
function searchData(array $table, string $primaryKey = "id", string $value)
{
    foreach ($table as $innerArray) {
        if (isset($innerArray[$primaryKey]) && $innerArray[$primaryKey] == $value) {
            return array(
                "data" => $innerArray,
                "boolean" => boolval(true)
            );
        }
    }
    return false;
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
