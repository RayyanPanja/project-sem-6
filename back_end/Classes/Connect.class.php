<?php

class Connection
{

    private static $AppName = "WeBank";

    private $HOST = "localhost";
    private $ServerUser = "root";
    private $ServerPassword = "";
    private $Database = "bank";

    public $con;

    public function Connect()
    {
        $con = mysqli_connect($this->HOST, $this->ServerUser, $this->ServerPassword, $this->Database);
        if ($con) {
            $this->con = $con;
            return $this;
        }
        return "Connection Failed";
    }
    public function getConnection()
    {
        return $this->con;
    }
    public static function getAppName()
    {
        return self::$AppName;
    }
}
