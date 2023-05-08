<?php

function validateSubject($subject)
{
    if ($subject === "Review" || $subject === "Question" || $subject === "Issues") {
        return true;
    } else {
        return false;
    }
}

function insert_into_Contact(array $DataSet): bool
{
    if (!(new Table("comment", "Cid"))->insertData($DataSet)) {
        return false;
    }
    return true;
}
