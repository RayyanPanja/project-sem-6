<?php



function insertUser(array $columns, array $values)
{
    $UserTable = new Table("main", "Account_number");
    $res = $UserTable->insert()->insert_columns($columns)->insert_values($values)->execute_query();
    if ($res) {
        return true;
    }
    return false;
}



function seperateAddress($address)
{
    $Address = explode(",", $address);
    return $Address;
}
function seperateCityandPin($City_Pin)
{
    $City_Pin = explode("-", $City_Pin);
    return $City_Pin;
}

function updateUser($tempAccount, array $DataSet)
{
    $UserTable = new Table("main", "Account_number");
    foreach ($DataSet as $key => $value) {
        $res = $UserTable->update($key, $value)->where("Account_number", $tempAccount)->execute_query();
    }
    if ($res) {
        return true;
    }
    return false;
}

function uploadProfileImage(string $image, string $path)
{
    $fileName = "";
    if (empty($_FILES[$image]['name'])) {
        $fileName = 'default.png';
    } else {
        $file = $_FILES[$image];
        $fileName = "USER-" . date("Y-M-d") . "-" . uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        $filePath = $path . "/" . $fileName;
        move_uploaded_file($file['tmp_name'], $filePath);
    }
    return $fileName;
}
