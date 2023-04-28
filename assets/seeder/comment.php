<?php
// Seed Account With Random Data...
include_once("../php/connection.php");
include_once("faker.php");

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
echo "<h1>{$fakeData} Fake Data Added...</h1>";

pca($Array, false, "Inserted into Comment Table:");
