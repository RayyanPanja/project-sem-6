<?php

class Connection
{
    private $con;
    private static $AppName = "WeBank";

    public function Connect()
    {
        $SERVER = "localhost";
        $USER = "root";
        $PASSWORD = "";
        $DATABASE = "bank";

        $this->con = mysqli_connect($SERVER, $USER, $PASSWORD, $DATABASE);

        return $this;
    }
    public function getConnection()
    {
        return $this->con;
    }

    public function run_query($sql)
    {
        return mysqli_query($this->Connect()->getConnection(), $sql);
    }
    
    public function extract_table_data($sql)
    {
        $Data = array();
        $res = $this->run_query($sql);
        while ($data = mysqli_fetch_assoc($res)) {
            array_push($Data, $data);
        }
        return $Data;
    }
    public static function getAppName()
    {
        return self::$AppName;
    }
}
