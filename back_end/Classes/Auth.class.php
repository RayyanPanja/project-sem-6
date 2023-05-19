<?php

class Auth
{

    public static function attempt(int $Account, string $Password)
    {
        $URL = new URL;
        $UserTable = new Table("main", "Account_number");

        $User = $UserTable->select()->where("Account_number", $Account)->execute_query();
        if (is_array($User)) {
            if ($User[0]["Password"] === $Password) {
                self::login($User[0]);
                return true;
            }else{
                alert("Password Incorrect!",$URL->getHomePage());
            }
        }else{
            alert("Account Does not Exist",$URL->getHomePage());
        }
        return false;
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
        $User = $UserTable->select()->where("Account_number", $Account)->execute_query();

        if (is_array($User)) {
            if ($User[0]["Blocked"] == boolval(true)) {
                return true;
            }
            return false;
        }
        return false;
    }
    public static function isauth()
    {
        if (Session::Exists("isLoggedin")) {
            return boolval(true);
        }
        return boolval(false);
    }
}
