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
    public static function Exist(string $key)
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
}
