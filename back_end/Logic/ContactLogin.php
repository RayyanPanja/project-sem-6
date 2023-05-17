<?php

function validateSubject($subject)
{

    if ($subject === "Review" || $subject === "Question" || $subject === "Issues") {
        return true;
    } else {
        return false;
    }
}

function insert_into_Contact(array $col, array $vals): bool
{
    if (!(new Table("comment", "Cid"))->insert()->insert_columns($col)->insert_values($vals)->execute_query()) {
        return false;
    }
    return true;
}
