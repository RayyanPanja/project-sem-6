<?php

class Auth
{

    public static function attempt(int $Account, string $Password)
    {

        $URL = new URL;

        $UserTable = new Table("main", "Account_number");
        $User = $UserTable->fetchWhere("Account_number", $Account)[0];
        if (is_bool($User)) {
            alert("User Does not Exist", $URL->getHomePage());
        } else {
            if ($User['Account_number'] == $Account) {
                if ($User['Password'] == $Password) {
                    self::login($User);
                    return boolval(true);
                } else {
                    alert("Password Incorrect", $URL->getHomePage());
                }
            } else {
                alert("Account Does not Match", $URL->getHomePage());
            }
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

    public static function isauth()
    {
        if (Session::Exist("isLoggedin")) {
            return boolval(true);
        }
        return boolval(false);
    }
}
