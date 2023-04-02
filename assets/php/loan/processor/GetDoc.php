<?php
include "../../connection.php";
 
$Account = $_SESSION['Account'];
$SirName = $_SESSION['Sirname'];
$Name = $_SESSION['Name'];
$FatherName = $_SESSION['Father'];
$Image = $_SESSION['image'];

$Application_ID = $_SESSION['TempAppID'];

if (
    !empty($_FILES['photo']['name']) &&
    !empty($_FILES['adharcard']['name']) &&
    !empty($_FILES['passbook']['name']) &&
    !empty($_FILES['chequebook']['name'])
) {
    $ImageArray = array(
        "Photo" => $_FILES['photo'],
        "AdharCard" => $_FILES['adharcard'],
        "Passbook" => $_FILES['passbook'],
        "ChequeBook" => $_FILES['chequebook']
    );
    // Generate a unique folder name...
    $FolderName = $Account . " - " . $Name . " - " . "Documents";
    $filePath = '../../../img/storage/docs/';

    if (!file_exists($FolderName)) {
        mkdir($filePath . $FolderName, 0777, true);
    }

    foreach ($ImageArray as $ImageName => $Image) {
        $fileName =  $ImageName . "." . pathinfo($Image['name'], PATHINFO_EXTENSION);
        // Move the uploaded file to the destination folder
        move_uploaded_file($Image['tmp_name'], $filePath . $FolderName . '/' . $fileName);
        // func.php
        SuperUpdate($con, 'loan', $ImageName, $fileName, 'Application_ID', $Application_ID);
    }

    $Update = "UPDATE `loan` SET  `Documents` = 'Submited' , `Doc_Folder` = '$FolderName' WHERE `Application_ID` = $Application_ID;";
    $Result = mysqli_query($con, $Update);
    if ($Result) {
        header("Location: ../success.php");
    }
}
