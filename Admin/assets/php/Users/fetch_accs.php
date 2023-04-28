<?php
include_once "../connection.php";


if (empty($_REQUEST['search'])) {
    $fetch = "SELECT * FROM main";
    $res = mysqli_query($con, $fetch);
    if (mysqli_num_rows($res) > 0) {
        while ($data = mysqli_fetch_assoc($res)) {
            $TemplateObject = "<div class='Account-list'>";
            $TemplateObject .= "<div class='account'>{$data['Account_number']}</div>";
            $TemplateObject .= "<div class='name'>{$data['Sirname']} {$data['Firstname']} {$data['Fathername']}</div>";
            $TemplateObject .= "<div class='contact-group'><div>{$data['Email']}</div><div>{$data['Contact']}</div></div>";
            $TemplateObject .= "<div class='amount'>{$data['Amount']}</div>";
            $TemplateObject .= "<Address>{$data['Address']} ,{$data['City']} - {$data['Pin_Code']} , {$data['State']} , {$data['Country']}</Address>";

            $TemplateObject .= "<div class='form-btn-set g-0 flex-col'>";
            $TemplateObject .= "<form method='post' action='proc/Detail.php' class='w-100'>";
            $TemplateObject .= "<input type='disable' value='{$data['Account_number']}' name='accno' class='hidden'/>";
            $TemplateObject .= "<button type='submit' class='form-btn primary-btn w-100'>Full Details</button>";
            $TemplateObject .= "</form>";

            $TemplateObject .= "</div>";

            $TemplateObject .= "</div>";
            echo $TemplateObject;
        }
    }
} else {
    $val = $_REQUEST['search'];
    $fetch = "SELECT * FROM `main` WHERE (`Account_number` LIKE '$val%' OR `Firstname` LIKE '$val%' OR `Sirname` LIKE '$val%')";
    $res = mysqli_query($con, $fetch);
    if (mysqli_num_rows($res) > 0) {
        while ($data = mysqli_fetch_assoc($res)) {
            $TemplateObject = "<div class='Account-list'>";
            $TemplateObject .= "<div class='account'>{$data['Account_number']}</div>";
            $TemplateObject .= "<div class='name'>{$data['Sirname']} {$data['Firstname']} {$data['Fathername']}</div>";
            $TemplateObject .= "<div class='contact-group'><div>{$data['Email']}</div><div>{$data['Contact']}</div></div>";
            $TemplateObject .= "<div class='amount'>{$data['Amount']}</div>";
            $TemplateObject .= "<Address>{$data['Address']} ,{$data['City']} - {$data['Pin_Code']} , {$data['State']} , {$data['Country']}</Address>";

            $TemplateObject .= "<div class='form-btn-set g-0 flex-col'>";
            $TemplateObject .= "<form method='post' action='proc/Detail.php' class='w-100'>";
            $TemplateObject .= "<input type='disable' value='{$data['Account_number']}' name='accno' class='hidden'/>";
            $TemplateObject .= "<button type='submit' class='form-btn primary-btn w-100'>Full Details</button>";
            $TemplateObject .= "</form>";
            $TemplateObject .= "</div>";
            $TemplateObject .= "</div>";
            echo $TemplateObject;
        }
    }
}
