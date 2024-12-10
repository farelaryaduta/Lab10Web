<?php
include("koneksi.php");
class Database {
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct() {
        $this->getConfig();
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    private function getConfig() {
        include_once("config.php");
        global $config; // Ensure $config is global
        $this->host = $config['localhost'];
        $this->user = $config['root'];
        $this->password = $config[''];
        $this->db_name = $config['latihan1'];
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function get($table, $where = null) {
        $whereClause = $where ? " WHERE " . $where : "";
        $sql = "SELECT * FROM " . $table . $whereClause;
        $result = $this->conn->query($sql);

        if ($result) {
            return $result->fetch_assoc(); // Fetch a single row
        } else {
            return false;
        }
    }

    public function insert($table, $data) {
        if (is_array($data)) {
            $columns = implode(",", array_keys($data));
            $values = implode(",", array_map(function ($val) {
                return "'{$val}'";
            }, $data));
            
            $sql = "INSERT INTO " . $table . " (" . $columns . ") VALUES (" . $values . ")";
            if ($this->conn->query($sql)) {
                return true;
            }
        }
        return false;
    }

    public function update($table, $data, $where) {
        if (is_array($data)) {
            $updateValue = [];
            foreach ($data as $key => $val) {
                $updateValue[] = "$key='{$val}'";
            }
            $updateValueString = implode(",", $updateValue);

            $sql = "UPDATE " . $table . " SET " . $updateValueString . " WHERE " . $where;
            if ($this->conn->query($sql)) {
                return true;
            }
        }
        return false;
    }

    public function delete($table, $filter) {
        $sql = "DELETE FROM " . $table . " " . $filter;
        if ($this->conn->query($sql)) {
            return true;
        }
        return false;
    }
}
?>
