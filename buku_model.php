<?php
require_once 'database.php';

class BukuModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT buku.*, kategori.nama_kategori 
                  FROM buku 
                  LEFT JOIN kategori ON buku.kategori_id = kategori.id 
                  ORDER BY buku.id DESC";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM buku WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Mengganti $stok menjadi $status
    public function insert($judul, $pengarang, $tahun_terbit, $kategori_id, $gambar, $status) {
        $query = "INSERT INTO buku (judul, pengarang, tahun_terbit, kategori_id, gambar, status) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssiiss", $judul, $pengarang, $tahun_terbit, $kategori_id, $gambar, $status);
        return $stmt->execute();
    }

    // Mengganti $stok menjadi $status
    public function update($id, $judul, $pengarang, $tahun_terbit, $kategori_id, $gambar, $status) {
        $query = "UPDATE buku SET judul=?, pengarang=?, tahun_terbit=?, kategori_id=?, gambar=?, status=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssiissi", $judul, $pengarang, $tahun_terbit, $kategori_id, $gambar, $status, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM buku WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>