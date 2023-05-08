<?php



function insertUser(array $Dataset)
{
    $UserTable = new Table("main", "Account_number");
    if ($UserTable->insertData($Dataset)) {
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
        if (!$UserTable->updateData("Account_number", $tempAccount, $key, $value)) {
            return false;
        }
    }
    return true;
}

function uploadProfileImage(string $image, string $path)
{
    $fileName = "";
    if (empty($_FILES[$image])) {
        $fileName = 'default.png';
    } else {
        $file = $_FILES[$image];
        $fileName = "USER-" . date("Y-M-d") . "-" . uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        $filePath = $path . "/" . $fileName;
        move_uploaded_file($file['tmp_name'], $filePath);
    }
    return $fileName;
}
