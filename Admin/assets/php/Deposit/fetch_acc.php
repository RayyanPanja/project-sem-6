<?php
include "../connection.php";

if (isset($_REQUEST['search'])) {
    $val = $_REQUEST['search'];
    $fetch = "SELECT * FROM `main` WHERE `Account_number` LIKE '%$val%'";
    $result = mysqli_query($con, $fetch);

    $obj = "<div class='list'>";
    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $obj .= "<h1 class='account-number'>" . $data['Account_number'] . "</h1>";
            $obj .= "<div class='holder-name'>" . $data['Sirname'] . $data['Firstname'] . $data['Fathername'] . "</div>";
            $obj .= "<div class='amount'>" . $data['Amount'] . "</div>";
            $obj .= "<div class='contact'>" . $data['Contact'] . "</div>";
            $obj .= "<div class='email'>" . $data['Email'] . "</div>";
            $obj .= "<div class='date'>" . $data['Date_Created'] . "</div>";
        }
    }else{
        $obj = '<h1 class="giant-text center">Account Does not Exist</h1>';
    }

    // Return data as HTML table
    echo $obj .= "</div>";

    // Close database connection
    $con->close();
}
