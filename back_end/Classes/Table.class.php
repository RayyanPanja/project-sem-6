<?php

class Table extends Connection
{
    private $table;
    private $primaryKey;
    private $dataLimit;
    public $con;

    public function __construct(string $table, string $primaryKey = "id", int $DataLimit = null)
    {
        $this->table = $table;
        $this->primaryKey = $primaryKey;
        $this->dataLimit = $DataLimit;
        $con = new Connection();
        $this->con = $con;
    }

    public function fetchTable()
    {
        $DataSet = array();

        $sql = "SELECT * FROM {$this->table}";
        $set = mysqli_query($this->Connect()->getConnection(), $sql);

        if ($set) {
            while ($data = mysqli_fetch_assoc($set)) {
                array_push($DataSet, $data);
            }
            return $DataSet;
        }
        return  boolval(false);
    }
    // CRUD..................................................
    public function insertData(array $dataSet)
    {
        $columns = implode(", ", array_keys($dataSet));
        $placeholders = implode(", ", array_fill(0, count($dataSet), "?"));
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $stmt = mysqli_prepare($this->Connect()->getConnection(), $sql);
        if ($stmt) {
            $values = array_values($dataSet);
            mysqli_stmt_bind_param($stmt, str_repeat('s', count($values)), ...$values);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            return true;
        } else {
            return false;
        }
    }

    public function fetchWhere(string $column = "id", $value)
    {
        $set = array();
        $sql = "";
        if (is_null($this->dataLimit)) {
            if (is_string($value)) {
                $sql = "SELECT * FROM `{$this->table}` WHERE `{$column}` = '{$value}'";
            } else {
                $sql = "SELECT * FROM `{$this->table}` WHERE `{$column}` = {$value}";
            }
        } else {
            if (is_string($value)) {
                $sql = "SELECT * FROM `{$this->table}` WHERE `{$column}` = '{$value}' LIMIT $this->dataLimit";
            } else {
                $sql = "SELECT * FROM `{$this->table}` WHERE `{$column}` = {$value} LIMIT $this->dataLimit";
            }
        }
        $result = mysqli_query($this->Connect()->getConnection(), $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_assoc($result)) {
                array_push($set, $data);
            }
            return $set;
        }
        return false;
    }
    public function fetchWhereOrderBy(string $column = "id", $value, string $OrderBy = "Date", string $Order = "ASC")
    {
        $set = array();
        $sql = "";
        if (is_null($this->dataLimit)) {
            if (is_string($value)) {
                $sql = "SELECT * FROM `{$this->table}` WHERE `{$column}` = '{$value}' ORDER BY `{$OrderBy}` {$Order}";
            } else {
                $sql = "SELECT * FROM `{$this->table}` WHERE `{$column}` = {$value} ORDER BY `{$OrderBy}` {$Order}";
            }
        } else {
            if (is_string($value)) {
                $sql = "SELECT * FROM `{$this->table}` WHERE `{$column}` = '{$value}' ORDER BY `{$OrderBy}` {$Order} LIMIT $this->dataLimit ";
            } else {
                $sql = "SELECT * FROM `{$this->table}` WHERE `{$column}` = {$value} ORDER BY `{$OrderBy}` {$Order} LIMIT $this->dataLimit";
            }
        }
        $result = mysqli_query($this->Connect()->getConnection(), $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_assoc($result)) {
                array_push($set, $data);
            }
            return $set;
        }
        return false;
    }
    public function fetchWhereLike(string $column, $LikeValue)
    {
        $ResultSet = array();
        $sql = "SELECT * FROM {$this->table} WHERE {$column} LIKE ?";
        $stmt = mysqli_prepare($this->Connect()->getConnection(), $sql);
        $searchPattern = "%{$LikeValue}%";
        mysqli_stmt_bind_param($stmt, "s", $searchPattern);
        mysqli_stmt_execute($stmt);
        $set = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($set) > 0) {
            while ($data = mysqli_fetch_assoc($set)) {
                array_push($ResultSet, $data);
            }
            return $ResultSet;
        } else {
            return false;
        }
    }

    public function updateData(string $SearchByColumn = "id", $columnValue, $columnToUpdate, $ValueToUpdate)
    {
        $con = $this->Connect()->getConnection();

        $sql = "";
        if (is_string($columnValue)) {
            $sql = "UPDATE `{$this->table}` SET `{$columnToUpdate}` = '{$ValueToUpdate}' WHERE `{$this->table}`.`{$SearchByColumn}` = '{$columnValue}';";
        } else if (is_null($columnValue)) {
            $sql = "UPDATE `{$this->table}` SET `{$columnToUpdate}` = '{$ValueToUpdate}' WHERE `{$this->table}`.`{$SearchByColumn}` = NULL";
        } else {
            $sql = "UPDATE `{$this->table}` SET `{$columnToUpdate}` = '{$ValueToUpdate}' WHERE `{$this->table}`.`{$SearchByColumn}` = {$columnValue};";
        }
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
    }



    public function deleteFromPrimary($id)
    {
        $sql = "DELETE FROM `{$this->table}` WHERE `{$this->primaryKey}` = {$id}";
        $res = mysqli_query($this->Connect()->getConnection(), $sql);
        if ($res) {
            return boolval(true);
        }
        return boolval(false);
    }

    public function deleteFromColumn(string $column, $value)
    {
        $sql = "";
        if (is_string($value)) {
            $sql = "DELETE FROM {$this->table} WHERE {$column} = '{$value}'";
        } else {
            $sql = "DELETE FROM {$this->table} WHERE {$column} = {$value}";
        }
        $res = mysqli_query($this->Connect()->getConnection(), $sql);
        if ($res) {
            return boolval(true);
        }
        return boolval(false);
    }

    // CRUD..................................................
}
