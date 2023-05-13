<?php

class Auth
{

    public static function attempt(int $Account, string $Password)
    {
        $URL = new URL;
        $UserTable = new Table("main", "Account_number");
        $User = $UserTable->fetchWhere("Account_number", $Account);
        if (is_array($User)) {
            if ($Account == $User[0]['Account_number']) {
                if ($Password == $User[0]['Password']) {
                    self::login($User[0]);
                    return true;
                } else {
                    alert("Password Incorrect", $URL->getHomePage());
                }
            } else {
                alert("Account Does not Exist", $URL->getHomePage());
            }
        } else {
            alert("Account Does not Exist", $URL->getHomePage());
        }
    }

    private static function login(array $User)
    {
        foreach ($User as $key => $value) {
            Session::setSession($key, $value);
        }
        $_SESSION['isLoggedin'] = boolval(true);
    }

    public static function logout()
    {
        $URL = new URL;
        session_destroy();
        header("Location: {$URL->getHomePage()}");
    }

    public static function check_if_Banned($Account)
    {
        $UserTable = new Table("main", "Account_number");
        $UserData = $UserTable->fetchWhere("Account_number", $Account);

        if (is_array($UserData)) {
            if ($UserData[0]["Blocked"] == boolval(true)) {
                return true;
            }
            return false;
        }
        return false;
    }
    public static function isauth()
    {
        if (Session::Exist("isLoggedin")) {
            return boolval(true);
        }
        return boolval(false);
    }
}
