<?php

class Tablex extends Connection
{
    private $table;
    private $primaryKey;
    private $tableData = [];
    private $tableColumns = [];
    private $SQL;

    function __construct(string $table, string $primaryKey)
    {
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    // Chains of SQL............

    // CRUD...
    public function insert()
    {
        $this->SQL = "INSERT INTO `{$this->table}` ";
        return $this;
    }

    public function select()
    {
        $this->SQL = "SELECT * FROM `{$this->table}` ";
        return $this;
    }

    public function update()
    {
        $this->SQL = "UPDATE `{$this->table}` SET ";
        return $this;
    }

    public function delete()
    {
        $this->SQL = "DELETE FROM `{$this->table}` ";
        return $this;
    }
    // CRUD...Ends

    // WHERE CLAUSE...
    public function where(string $column, $value)
    {
        if (is_string($value)) {
            $this->SQL .= " WHERE `{$column}` = '{$value}' ";
        } else {
            $this->SQL .= " WHERE `{$column}` = {$value} ";
        }
        return $this;
    }
    public function where_primary($value)
    {
        if (is_string($value)) {
            $this->SQL .= " WHERE `{$this->primaryKey}` = '{$value}' ";
        } else {
            $this->SQL .= " WHERE `{$this->primaryKey}` = {$value} ";
        }
        return $this;
    }

    public function expression($column, $value)
    {
        $this->SQL .= " `{$column}` = '{$value}' ";
        return $this;
    }
    // WHERE CLAUSE...ENds

    // LOGIC OPERATORS...
    public function and()
    {
        $this->SQL .= " AND ";
        return $this;
    }
    public function or()
    {
        $this->SQL .= " OR ";
        return $this;
    }
    public function not()
    {
        $this->SQL .= " NOT ";
        return $this;
    }
    // LOGIC OPERATORS...Ends

    // LIKE...
    public function like($column, $value)
    {
        $this->SQL .= " `{$column}` LIKE '%$value%' ";
    }
    // LIKE...ENds

    // get Data...
    public function get_Data()
    {
        $this->tableData = $this->select()->execute_query($this->SQL);
        return $this->tableData;
    }
    // get Data...Ends

    // DEBUG.....
    public function print_SQL()
    {
        echo "SQL:  " . $this->SQL;
        return $this;
    }
    
    // DEBUG.....Ends





}
