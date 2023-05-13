<?php


class Helper
{
    public static function pa(array $array, bool $die = false)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
        if ($die) {
            die;
        }
    }

    public static function alert_and_move(string $message, $path)
    {
        echo "<script>";
        echo "alert('{$message}') location.assign('{$path}')";
        echo "</script>";
    }

    public static function just_alert($message)
    {
        echo "<script>";
        echo "alert('{$message}')";
        echo "</script>";
    }

    public static function just_move($path)
    {
        echo "<script>";
        echo "location.assign('{$path}')";
        echo "</script>";
    }
}
