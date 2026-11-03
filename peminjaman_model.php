<?php
require_once 'database.php';

class PeminjamanModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT p.*, u.nama as nama_user, b.judul as judul_buku 
                  FROM peminjaman p
                  LEFT JOIN users u ON p.user_id = u.id
                  LEFT JOIN buku b ON p.buku_id = b.id";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM peminjaman WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateStatus($id, $status) {
        $query = "UPDATE peminjaman SET status = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $status, $id);
        return $stmt->execute();
    }

    public function insert($user_id, $buku_id, $tanggal_pinjam, $tanggal_kembali, $status) {
        $query = "INSERT INTO peminjaman (user_id, buku_id, tanggal_pinjam, tanggal_kembali, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iisss", $user_id, $buku_id, $tanggal_pinjam, $tanggal_kembali, $status);
        return $stmt->execute();
    }
}
?>