<?php


function checkIfLoanRequested(int $accont)
{
    $UserTable = new Table("main", "Account");
    $User = $UserTable->fetchWhere("Account_number", $accont)[0];

    if (is_bool($User)) {
        return false;
    }
    if ($User['Loan_requested'] === "No") {
        return true;
    }
}


function updateLoanData($packageID)
{
    $LoanTable = new Table("loan", "Application_ID");
    $PackagesTable = new Table("loan_packages", "Package_ID");
    $PackageData = $PackagesTable->fetchWhere("Package_ID", $packageID)[0];

    if ($LoanTable->updateData("Application_ID", Session::getSession("tempAppID"), "Package_ID", $packageID)) {
        if ($LoanTable->updateData("Application_ID", Session::getSession("tempAppID"), "Package_Name", $PackageData["Package_Name"])) {
            if ($LoanTable->updateData("Application_ID", Session::getSession("tempAppID"), "Package_Amount", $PackageData["Package_Amount"])) {
                return true;
            }
            return false;
        }
        return false;
    }
    return false;
}

function uploadImage($image, string $name, string $path, string $column)
{
    if (empty($image['name'])) {
        return false;
    }

    $FolderName = Session::getSession("Username") . "-" . Session::getSession("Account_number") . "-Documents";
    $filePath = $path . $FolderName;

    if (!file_exists($filePath)) {
        mkdir($filePath, 0777, true);
    }

    $imageName = $name . "." . pathinfo($image['name'], PATHINFO_EXTENSION);

    if (!move_uploaded_file($image['tmp_name'], $filePath . "/" . $imageName)) {
        justAlert("NOOOOOO");
    }

    $LoanTable = new Table("loan", "Application_ID");
    $updateFolder = $LoanTable->updateData("Application_ID", Session::getSession("tempAppID"), "Doc_Folder", "Exists");
    $updateColumn = $LoanTable->updateData("Application_ID", Session::getSession("tempAppID"), $column, $imageName);
    return $updateFolder && $updateColumn;

    return false;
}

function setLoanRequest(Table $UserTable, $Account)
{
    if ($UserTable->updateData("Account_number", $Account, "Loan_Requested", "Yes")) {
        return true;
    }
    return false;
}
