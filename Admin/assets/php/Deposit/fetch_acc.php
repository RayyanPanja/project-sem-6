<?php
require "../connection.php";

if (isset($_REQUEST['search'])) {
    $val = $_REQUEST['search'];
    $fetch = "SELECT * FROM `main` WHERE (`Account_number` LIKE '$val%' OR `Firstname` LIKE '$val%' OR `Sirname` LIKE '$val%')";
    $result = mysqli_query($con, $fetch);

    $obj = "<div class='search-option'>";
    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $obj .= "<h2 class='account-number'>" . $data['Account_number'] . "</h2>";
            $obj .= "<div class='holder-name'>" . $data['Sirname'] ." ". $data['Firstname'] ." ". $data['Fathername'] . "</div>";
            $obj .= "<div class='account-number'>" . $data['Email'] . "</div>";
            $obj .= "<div class='account-number'>" . $data['Contact'] . "</div>";
        }
    }else{
        $obj = '<div class="default">Account Does not Exist</div>';
    }
    // Return data as HTML table
    echo $obj .= "</div>";

    // Close database connection
    $con->close();
}
