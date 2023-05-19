<?php


class Helper
{
    public static function pa(array $array, bool $die = false)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
        if ($die) {
            die;
        }
    }

    public static function alert_and_move(string $message, $path)
    {
        echo "<script>";
        echo "alert('{$message}') location.assign('{$path}')";
        echo "</script>";
    }

    public static function just_alert($message)
    {
        echo "<script>";
        echo "alert('{$message}')";
        echo "</script>";
    }

    public static function just_move($path)
    {
        echo "<script>";
        echo "location.assign('{$path}')";
        echo "</script>";
    }

    public static function updateBankAmount()
    {
        $Amount = 0;

        $UserTable = new Table("main", "Account_number");
        $Data = $UserTable->select()->execute_query();

        for ($i = 0; $i <  count($Data); $i++) {
            $Amount += $Data[$i]["Amount"];
        }

        $LoanPackages = new Table("loan_packages", "Package_ID");
        $PackageData = $LoanPackages->select()->execute_query();
        for ($i = 0; $i <  count($PackageData); $i++) {
            $Amount += $PackageData[$i]["Package_Amount"];
        }

        $Bank = new Table("bank", "Account");
        $Bank->update("Amount", $Amount)->execute_query();
    }
}
