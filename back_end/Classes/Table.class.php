<?php

class Table extends Connection
{
    private $table;
    private $primaryKey;
    private $tableData = array();
    private $tableColumns = array();
    private $SQL;


    public function __construct(string $table_name, $primaryKey)
    {
        $this->table = $table_name;
        $this->primaryKey = $primaryKey;
    }

    // QUERY CHAIN
    public function insert()
    {
        $this->SQL = "INSERT INTO `{$this->table}` ";
        return $this;
    }
    public function insert_columns(array $columns)
    {
        $this->SQL .= "(";
        for ($i = 0; $i < count($columns); $i++) {
            if ($i === (count($columns) - 1)) {
                $this->SQL .= " `{$columns[$i]}` ";
            } else {
                $this->SQL .= " `{$columns[$i]}` , ";
            }
        }
        $this->SQL .= ")";
        return $this;
    }
    public function insert_values(array $values)
    {
        $this->SQL .= " VALUES (";
        for ($i = 0; $i < count($values); $i++) {
            if ($i === (count($values) - 1)) {
                if (is_string($values[$i])) {
                    $this->SQL .= " '{$values[$i]}'";
                } else {
                    $this->SQL .= " {$values[$i]}";
                }
            } else {
                if (is_string($values[$i])) {
                    $this->SQL .= " '{$values[$i]}' , ";
                } else {
                    $this->SQL .= " {$values[$i]} , ";
                }
            }
        }
        $this->SQL .= ");";
        return $this;
    }

    public function select()
    {
        $this->SQL = "SELECT * FROM `{$this->table}`";
        $sql = $this->SQL;
        $this->tableData = $this->extract_table_data($sql);
        return $this;
    }

    public function update(string $column, $value)
    {
        if (is_string($value)) {
            $this->SQL = "UPDATE `{$this->table}` SET `{$column}` = '{$value}' ";
        } else {
            $this->SQL = "UPDATE `{$this->table}` SET `{$column}` = {$value} ";
        }
        return $this;
    }

    public function delete()
    {
        $this->SQL = "DELETE FROM `{$this->table}`";
        return $this;
    }

    public function where(string $column = "primary Key", $id)
    {
        if ($column === "primary Key") {
            $column = $this->primaryKey;
        }
        if (is_string($id)) {
            $this->SQL .= " WHERE `{$column}` = '{$id}' ";
        } else {
            $this->SQL .= " WHERE `{$column}` = {$id} ";
        }
        return $this;
    }

    public function like(string $column, $value)
    {
        $this->SQL .= " WHERE `{$column}` LIKE '{$value}%' ";
        return $this;
    }

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
    public function order_by(string $by_Column, string $val = "DESC")
    {
        $this->SQL .= " ORDER BY `{$by_Column}` {$val} ";
        return $this;
    }

    public function first()
    {
        return $this->tableData[0];
    }

    public function execute_query()
    {
        $this->SQL .= ";";
        if (strpos($this->SQL, "SELECT") !== false) {
            return $this->extract_table_data($this->SQL);
        } else {
            return $this->run_query($this->SQL);
        }
    }

    public function get_Table(int $col = null)
    {
        $this->tableData = $this->extract_table_data($this->SQL);
        if ($col === null) {
            return $this->tableData;
        } else {
            return $this->tableData[$col];
        }
        if (is_null($this->tableData) || is_bool($this->tableData)) {
            return false;
        }
    }

    public function Fetch_Columns()
    {
        $this->SQL = "SHOW COLUMNS FROM `{$this->table}`";
        $result = $this->run_query($this->SQL);

        while ($row = mysqli_fetch_assoc($result)) {
            $this->tableColumns[] = $row['Field'];
        }

        return $this;
    }
    public function get_Columns()
    {
        return $this->tableColumns;
    }

    public function get_data_from_primary($id)
    {
        $sql = $this->SQL . " WHERE `{$this->primaryKey}` = {$id}";
        return $this->extract_table_data($sql)[0];
    }

    public function get_data_from_column(string $column, $value)
    {
        $this->where($column, $value);
        return $this->extract_table_data($this->SQL);
    }

    public function print_SQL(bool $die = false)
    {
        echo "SQL: <p class='sql'>" . $this->SQL . "</p><br>";
        if ($die) {
            die;
        }
        return $this;
    }
    public function clear_SQL()
    {
        $this->SQL = "";
        return $this;
    }
    public function print_tableData()
    {
        echo "DATA: <br>";
        Helper::pa($this->tableData);
        return $this;
    }
}
