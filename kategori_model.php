<?php
require_once 'database.php';

class KategoriModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM kategori";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM kategori WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function insert($nama_kategori) {
        $query = "INSERT INTO kategori (nama_kategori) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $nama_kategori);
        return $stmt->execute();
    }

    public function update($id, $nama_kategori) {
        $query = "UPDATE kategori SET nama_kategori = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $nama_kategori, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM kategori WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>