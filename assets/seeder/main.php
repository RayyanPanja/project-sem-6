<?php
// Seed Account With Random Data...
include("../php/connection.php");
include("faker.php");

$fakeData = 100;

$Array = array();

for ($i = 0; $i < $fakeData; $i++) {
    $Account = RandomNumber(5);
    $UserName = RandomString(5) . "@123";
    $SName = RandomString(6);
    $Name = RandomString(6);
    $FName = RandomString(6);
    $Password = RandomNumber(8);
    $Amount = RandomNumber(10);
    $Img = RandomString(30) . ".png";
    $Address = RandomString(20);
    $City = RandomString(10);
    $Pin = RandomNumber(6);
    $State = RandomString(10);
    $Country = RandomString(10);
    $DOB = RandomDate('2002-01-01', '2023-12-31');
    $Gender = "Male";
    $Email = RandomString(6) . "@gmail.com";
    $Contact = RandomNumber(8);
    $Created = RandomDate('2002-01-01', '2023-12-31');

    $sql = "INSERT INTO `main` 
    (   `Account_number`, 
        `Username`, 
        `Sirname`, 
        `Firstname`, 
        `Fathername`, 
        `Password`, 
        `Amount`, 
        `Img_Path`, 
        `Address`, 
        `City`, 
        `Pin_Code`, 
        `State`, 
        `Country`, 
        `Date Of Birth`, 
        `Gender`, 
        `Loan_taken`, 
        `Loan_requested`, 
        `Email`,
        `Contact`, 
        `Date_Created`, 
        `Created`, 
        `Blocked`) 
VALUES 
(
    $Account,
    '$UserName',
    '$SName',
    '$Name',
    '$FName',
    '$Password',
    $Amount,
    '$Img',
    '$Address',
    '$City',
    '$Pin',
    '$State',
    '$Country',
    '$DOB',
    '$Gender',
    'No',
    'No',
    '$Email',
    $Contact,
    '$Created',
    true,
    false    
);";
    $res = mysqli_query($con, $sql);
    if ($res) {
        $up = $i + 1;
        array_push($Array, $up);
    }
}

pca($Array, false, "Inserted into Main Table:");
