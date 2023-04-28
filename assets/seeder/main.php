<?php
// Seed Account With Random Data...
include_once("../php/connection.php");
include_once("faker.php");

$fakeData = 10;

$Array = array();

for ($i = 0; $i < $fakeData; $i++) {
    $Account = RandomNumber(5);
    $UserName = RandomString(5) . "@" . RandomNumber(3);
    $SName = RandomString(6);
    $Name = RandomString(6);
    $FName = RandomString(6);
    $Password = RandomNumber(8);
    $Amount = RandomNumber(4);
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
    // $Created = RandomDate('2002-01-01', '2023-12-31');

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
        `Blocked`
    ) 
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
    current_timestamp(),
    true,
    false    
);";

    $res = mysqli_query($con, $sql);
    if ($res) {
        $up = $i + 1;
        array_push($Array, $up);
    }
}

echo "<h1 class='text-center'>{$fakeData} Fake Data Added...</h1>";

pca($Array, false, "Inserted into Main Table:");
