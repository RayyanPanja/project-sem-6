<?php
// Faker

function RandomString($length)
{
    $chars = "qwertyuiopasdfghjklzxcvbnm";
    $String = '';
    for ($i = 0; $i < $length; $i++) {
        $String .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $String;
}

function RandomNumber($length)
{
    $min = pow(10, $length - 1);
    $max = pow(10, $length) - 1;
    $RandomInt = rand($min, $max);
    while (strlen((string)$RandomInt) != $length) {
        $RandomInt = rand($min, $max);
    }
    return $RandomInt;
}

function RandomBoolean()
{
    $bool = (bool)rand(0, 1);
    return $bool;
}

function RandomDate($from, $to)
{
    $From = strtotime($from);
    $To = strtotime($to);

    $randomStamp = rand($From, $To);

    $date = date("Y-m-d", $randomStamp);
    return $date;
}
