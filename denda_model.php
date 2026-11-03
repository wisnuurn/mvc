<?php
require_once 'database.php';

class DendaModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT d.*, u.nama as nama_user, b.judul as judul_buku 
                  FROM denda d
                  LEFT JOIN peminjaman p ON d.peminjaman_id = p.id
                  LEFT JOIN users u ON p.user_id = u.id
                  LEFT JOIN buku b ON p.buku_id = b.id";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM denda WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateStatus($id, $status_bayar) {
        $query = "UPDATE denda SET status_bayar = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $status_bayar, $id);
        return $stmt->execute();
    }

    public function insert($peminjaman_id, $jumlah_denda, $status_bayar) {
        $query = "INSERT INTO denda (peminjaman_id, jumlah_denda, status_bayar) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iis", $peminjaman_id, $jumlah_denda, $status_bayar);
        return $stmt->execute();
    }
}
?>