<?php
include('../../../../connection.php');
include('../../../../../DBFuncs.php');


$fileName;
if (empty($_FILES['image']['name'])) {
    $fileName = 'default.png';
} else {
    $file = $_FILES['image'];
    $fileName = $_SESSION['Img_Path'];
    $filePath = '../../../../../img/storage/' . $fileName;
    move_uploaded_file($file['tmp_name'], $filePath);

    $Data = array(
        "Img_Path" => $fileName
    );
    if (UpdateTableData($con, 'main', $Data, 'Account_number', $_SESSION['Account_number'])) {
        $UserTable = fetchAllFrom($con, "main");
        $User = fetchWhere($UserTable, "Account_number", $_SESSION['Account_number'])['data'];
        refreshUserSessions($User);
        alert("Profile Image Updated!!", '../ui.php');
    } else {
        alert("Could not Updated!!", '../ui.php');
    }
}
