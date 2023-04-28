<?php
include_once "../../connection.php";
 
$Acc = $_SESSION['TempAcc'];

$email = $_REQUEST['email'];
$contact = $_REQUEST['contact'];
$fileName;

if (empty($_FILES['image']['name'])) {
    // Use the default image
    $fileName = 'default.png';
} else {
    // Get the file data
    $file = $_FILES['image'];
    // Generate a unique file name
    $fileName = "USER-" . date("Y-M-d"). "-" . uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    // Set the destination folder
    $filePath = '../../../img/storage/' . $fileName;
    // Move the uploaded file to the destination folder
    move_uploaded_file($file['tmp_name'], $filePath);
}

$Update = "UPDATE `main` SET `Img_Path` = '$fileName' , `Email` = '$email' , `Contact` = $contact WHERE `Account_number` = $Acc;";
$Result = mysqli_query($con, $Update);
if ($Result) {
    header("Location: ../setpsw.php");
}
