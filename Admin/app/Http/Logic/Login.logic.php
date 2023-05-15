<?php

function check_if_user_exists($Account)
{
    $UserTable = new Table("admin", "Admin_ID");
    $User = $UserTable->select()->where("Admin_ID", $Account)->get_Table(0);
    if (is_array($User)) {
        return true;
    }
    return false;
    // Helper::pa($User, true);
}

function register_user(array $User)
{
    foreach ($User as $key => $value) {
        Session::setSession($key, $value);
    }
    Session::setSession("AdminLoggedin", true);

    return true;
}
