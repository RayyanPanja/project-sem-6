<?php


class Session
{
    public static function startSession()
    {
        session_start();
    }
    public static function getSession($key)
    {
        return $_SESSION[$key];
    }
    public static function setSession(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public static function deleteSession(string $key)
    {
        unset($_SESSION[$key]);
    }
    public static function destroySession()
    {
        session_destroy();
    }
    public static function printSession()
    {
        pa($_SESSION);
    }
    public static function Exists(string $key)
    {
        return (isset($_SESSION[$key])) ? true : false;
    }
    public static function compareSession($value, string $SessionKey)
    {
        if ($value === Session::getSession($SessionKey)) {
            return true;
        } else {
            return false;
        }
    }
    public static function referesh()
    {
        if (self::Exists("Account_number")) {
            foreach ($_SESSION as $key) {
                if ($key != "Account_number") {
                    unset($_SESSION[$key]);
                }
            }

            $USER_TABLE = new Table("main", "Account_number");
            $USER = $USER_TABLE->select()->where("Account_number", self::getSession("Account_number"))->execute_query()[0];

            foreach ($USER as $key => $value) {
                $_SESSION[$key] = $value;
            }
            return true;
        }
        return false;
    }
}
