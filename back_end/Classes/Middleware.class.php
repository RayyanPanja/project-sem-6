<?php

class MiddleWare
{
    public static function askPin()
    {
        $URL = new URL;
        header("Location: {$URL->getMiddleWare("Security")}");
    }

    public static function TryAccess($password)
    {
        if ($password === Session::getSession('Password')) {
            Session::setSession("allowAccess", true);
            return true;
        } else {
            return false;
        }
    }
    public static function getAccessPermission()
    {
        return Session::getSession("allowAccess");
    }
}
