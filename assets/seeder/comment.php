<?php
// Seed Account With Random Data...
include("../php/connection.php");
include("faker.php");

$fakeData = 20;

$Array = array();

for ($i = 0; $i < $fakeData; $i++) {
    $Cid = RandomNumber(5);
    $Email = RandomString(5) . "@gmail.com";
    $Subject = RandomString(7);
    $Msg = RandomString(20);
    $Status = RandomString(6);

    $sql = "INSERT INTO `comment` 
    (   
        `Cid`,
        `Email`,
        `Subject`,
        `Msg`
    ) 
VALUES 
(
    $Cid,
    '$Email',
    '$Subject',
    '$Msg'
);
";
    $res = mysqli_query($con, $sql);
    if ($res) {
        $up = $i + 1;
        array_push($Array, $up);
    }
}

pca($Array, false, "Inserted into Comment Table:");
