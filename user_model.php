<?php
require_once 'database.php';

class UserModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getUsers() {
        $query = "SELECT * FROM users ORDER BY id DESC";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Fungsi baru untuk mengecek email dan password
    public function cekLogin($email, $password) {
        $query = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Fungsi insert diperbarui untuk menerima password
    public function insert($nama, $email, $password, $role) {
        $query = "INSERT INTO users (nama, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $nama, $email, $password, $role);
        return $stmt->execute();
    }

    public function update($id, $nama, $email, $role) {
        $query = "UPDATE users SET nama=?, email=?, role=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssi", $nama, $email, $role, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>