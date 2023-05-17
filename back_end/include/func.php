<?php
// Print Array
if (!function_exists("pa")) {
    function pa($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
}

// Alert and move to next page...
if (!function_exists("alert")) {
    function alert($msg, $path)
    {
        Session::referesh();
        echo "<script>";
        echo "alert('$msg');";
        echo "window.location.assign('$path');";
        echo "</script>";
    }
    function justAlert($msg)
    {
        echo "<script>";
        echo "alert('$msg');";
        echo "</script>";
    }
    function justChangePath($path)
    {
        Session::referesh();
        echo "<script>";
        echo "window.location.assign('$path');";
        echo "</script>";
    }
}


if (!function_exists("generateRewardKey")) {

    function generateRewardKey()
    {
        $length = 12 - 4; // Length of the random string - 4 = four '-' dash..
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // Characters to choose from
        $string = '';

        // Generate a random string by picking random characters from the list
        for ($i = 0; $i < $length; $i++) {
            if ($i % 3 === 0 && $i !== 0) {
                $string .= "-";
            }
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $string;
    }
    function generateCashBack()
    {
        return round((rand(1000, 5000) / 100), 2);
    }
}

if (!function_exists("getDateAfterDays")) {
    function getDateAfterDays($numberOfDays)
    {
        $date = date('Y-m-d', strtotime("+{$numberOfDays} days"));
        // Replace `Y-m-d` with the appropriate date format that you want to return
        return $date;
    }
}


if (!function_exists("Jumbe")) {
    function Jumble(int $num): int
    {
        $digits = str_split((string)$num);
        shuffle($digits);
        return (int)implode('', $digits);
    }
}


if (!function_exists("filter_array")) {
    function filter_array($array)
    {
        $newArray = array();
        foreach ($array as $subarray) {
            $filteredSubarray = array();
            foreach ($subarray as $key => $value) {
                if ($key === "Reference_to_Message" && $value === null) {
                    continue; // Skip iteration for key with null value
                }
                $filteredSubarray[$key] = $value; // Store the key-value pair in the filtered subarray
            }
            $newArray[] = $filteredSubarray; // Add the filtered subarray to the new array
        }
        return $newArray; // Return the filtered multi-dimensional array
    }
}
