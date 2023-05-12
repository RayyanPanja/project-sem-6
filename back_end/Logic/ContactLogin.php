<?php

function validateSubject($subject)
{

    if ($subject === "Review" || $subject === "Question" || $subject === "Issues") {
        return true;
    } else {
        $subject = explode("-", $subject);
        if ($subject[0] === "Follow up Question") {
            return true;
        }
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

function followUpQustion($subject, $cid)
{
    if ($subject === "Follow up Question") {
        $dataSet = array(
            "Reference_to_Message" => $cid
        );
        (new Table("comment", "Cid"))->insertData($dataSet);
        return true;
    }
    return false;
}
