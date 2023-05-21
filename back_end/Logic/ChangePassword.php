<?php

function check_if_passwords_equal($psw1, $psw2)
{
    if ($psw1 === $psw2) {
        return true;
    }
    return false;
}

function update_password($psw)
{
    $Table = new Table("main", "Account_number");
    return $Table->update("Password", $psw)->where("Account_number", Session::getSession("Account_number"))->execute_query();
}

function add_notification(array $cols, array $vals): bool
{
    $Table = new Table("notifications", "id");
    $res = $Table->insert()->insert_columns($cols)->insert_values($vals)->execute_query();
    if ($res) {
        return true;
    }
    return false;
}
