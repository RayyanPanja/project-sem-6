<?php

function check_if_not_null(string $column, $primaryValue)
{
    $Table = new Table("comment", "Cid");
    $Data = $Table->fetchWhere("Cid", $primaryValue);
    if (is_array($Data)) {
        if ($Data[0][$column] === null) {
            return false;
        } else {
            if (clear_column($Table, $column, $primaryValue)) {
                return true;
            }
            return false;
        }
    }
    return false;
}

function clear_column(Table $Table, $column, $primaryValue)
{
    if ($Table->updateData("Cid", $primaryValue, $column, null)) {
        return true;
    }
    return false;
}
