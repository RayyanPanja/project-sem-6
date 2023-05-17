<?php


function checkIfLoanRequested(int $accont)
{
    $UserTable = new Table("main", "Account");
    $User = $UserTable->select()->where("Account_number", $accont)->execute_query()[0];

    if (is_bool($User)) {
        return false;
    }
    if ($User['Loan_requested'] == false) {
        return true;
    }
}


function updateLoanData($packageID)
{
    $LoanTable = new Table("loan", "Application_ID");
    $PackagesTable = new Table("loan_packages", "Package_ID");
    $PackageData = $PackagesTable->select()->where("Package_ID", $packageID)->execute_query()[0];

    if (!is_array($PackageData)) {
        return false;
    }

    $res = $LoanTable->update("Package_ID", $PackageData["Package_ID"])->where("Application_ID", Session::getSession("tempAppID"))->execute_query();
    $res2 = $LoanTable->update("Package_Name", $PackageData["Package_Name"])->where("Application_ID", Session::getSession("tempAppID"))->execute_query();
    $res3 = $LoanTable->update("Package_Amount", $PackageData["Package_Amount"])->where("Application_ID", Session::getSession("tempAppID"))->execute_query();

    $users = $PackageData["Users_Using"] + 1;
    $res4 = $PackagesTable->update("Users_Using", $users)->where("Package_ID", $packageID)->execute_query();

    if ($res && $res2 && $res3 && $res4) {
        return true;
    }
}

function uploadImage($image, string $name, string $path, string $column)
{
    if (empty($image['name'])) {
        return false;
    }

    $FolderName = Session::getSession("Username") . "-" . Session::getSession("Account_number") . uniqid() . "-Documents";
    $filePath = $path . $FolderName;

    if (!file_exists($filePath)) {
        mkdir($filePath, 0777, true);
    }

    $imageName = $name . "." . pathinfo($image['name'], PATHINFO_EXTENSION);

    if (!move_uploaded_file($image['tmp_name'], $filePath . "/" . $imageName)) {
        justAlert("NOOOOOO");
    }

    $LoanTable = new Table("loan", "Application_ID");
    $updateFolder = $LoanTable->update("Doc_Folder", $FolderName)->where("Application_ID", Session::getSession("tempAppID"))->execute_query();
    $updateColumn = $LoanTable->update($column, $imageName)->where("Application_ID", Session::getSession("tempAppID"))->execute_query();
    $res = $LoanTable->update('Documents', "Submitted")->where("Application_ID", Session::getSession("tempAppID"))->execute_query();
    return $updateFolder && $updateColumn && $res;
}

function setLoanRequest(Table $UserTable, $Account)
{
    if ($UserTable->update("Account_number", $Account, "Loan_Requested", "Yes")->where("Account_number", $Account)->execute_query()) {
        return true;
    }
    return false;
}
