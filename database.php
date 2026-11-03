<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "db_siperpus";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
            if ($this->conn->connect_error) {
                die("Koneksi gagal: " . $this->conn->connect_error);
            }
        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>