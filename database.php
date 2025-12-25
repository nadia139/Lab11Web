<?php
class Database
{
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct()
    {
        $this->getConfig();
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        
        // Set charset
        $this->conn->set_charset("utf8mb4");
        
        if ($this->conn->connect_error) {
            die("❌ Connection failed: " . $this->conn->connect_error);
        }
    }

    private function getConfig()
    {
        include(__DIR__ . "/../config.php");
        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->password = $config['password'];
        $this->db_name = $config['db_name'];
    }

    public function query($sql)
    {
        $result = $this->conn->query($sql);
        if (!$result) {
            echo "❌ Query Error: " . $this->conn->error . "<br>";
            echo "SQL: " . $sql . "<br>";
        }
        return $result;
    }

    public function get($table, $where = null)
    {
        if ($where) {
            $where = " WHERE " . $where;
        }
        $sql = "SELECT * FROM " . $table . $where;
        $result = $this->conn->query($sql);
        
        if (!$result) {
            echo "❌ Get Error: " . $this->conn->error . "<br>";
            return false;
        }
        
        return $result->fetch_assoc();
    }

    public function insert($table, $data)
    {
        if (is_array($data)) {
            $columns = [];
            $values = [];
            
            foreach ($data as $key => $val) {
                $columns[] = "`" . $key . "`";
                $values[] = "'" . $this->conn->real_escape_string($val) . "'";
            }
            
            $columns_str = implode(",", $columns);
            $values_str = implode(",", $values);
            
            $sql = "INSERT INTO " . $table . " (" . $columns_str . ") VALUES (" . $values_str . ")";
            
            $result = $this->conn->query($sql);
            
            if ($result) {
                return $this->conn->insert_id;
            } else {
                echo "❌ Insert Error: " . $this->conn->error . "<br>";
                echo "SQL: " . $sql . "<br>";
                return false;
            }
        }
        return false;
    }

    public function update($table, $data, $where)
    {
        $update_value = [];
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $update_value[] = "`" . $key . "`='" . $this->conn->real_escape_string($val) . "'";
            }
            $update_value_str = implode(",", $update_value);
        }
        
        $sql = "UPDATE " . $table . " SET " . $update_value_str . " WHERE " . $where;
        $result = $this->conn->query($sql);
        
        if ($result) {
            return true;
        } else {
            echo "❌ Update Error: " . $this->conn->error . "<br>";
            echo "SQL: " . $sql . "<br>";
            return false;
        }
    }

    public function delete($table, $where)
    {
        $sql = "DELETE FROM " . $table . " WHERE " . $where;
        $result = $this->conn->query($sql);
        
        if ($result) {
            return true;
        } else {
            echo "❌ Delete Error: " . $this->conn->error . "<br>";
            echo "SQL: " . $sql . "<br>";
            return false;
        }
    }
}
?>