<?php

class Session
{
    public static function start_Session()
    {
        session_start();
    }
    public static function destroy_Session()
    {
        session_destroy();
    }
    public static function print_Session()
    {
        Helper::pa($_SESSION);
    }
    public static function Exists(string $key)
    {
        return isset($_SESSION[$key]);
    }
    public static function setSession(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public static function getSession(string $key)
    {
        return $_SESSION[$key];
    }
    public static function kill_Session(string $key)
    {
        unset($_SESSION[$key]);
    }
}
