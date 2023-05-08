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
        return round((rand(1000, 10000) / 100), 2);
    }
    function generateHugeCashBack()
    {
        return round((rand(10000, 50000) / 100), 2);
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
